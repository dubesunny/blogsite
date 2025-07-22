<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class FrontEndController extends Controller
{
    /**
     * Get Home Page
     */
    public function index()
    {
        $categories = Category::whereStatus('active')->latest()->limit(6)->get();
        $posts = Post::with(['categories' => function($q){
            $q->where('status','active');
        } , 'user' => function($q){
              $q->where('status','active');
        }])->whereStatus('published')->latest()->simplePaginate(7);
        return view('frontend.index', compact('categories', 'posts'));
    }

    /**
     * Specific category page
     */
    public function categories(Category $category)
    {
        $posts = Post::with('user')->whereHas('categories', function ($q) use ($category) {
            $q->where('id', $category->id);
        })->where('status', 'published')->get();
        return view('frontend.categories', compact('posts', 'category'));
    }

    /**
     * Post Detail Page
     */
    public function postDetails(Post $post)
    {
        $post = $post->load(['user', 'categories' => function ($q) {
            $q->where('status', 'active');
        }]);
        $comments = Comment::with(['replies', 'user'])->where('post_id', $post->id)->where('parent_id',null)->where('status','approved')->latest()->get();
        $likeCount = Like::where('post_id',$post->id)->where('reaction',1)->count();
        $dislikeCount = Like::where('post_id',$post->id)->where('reaction',0)->count();
        $userId = Auth::user()?->id;
        $reaction = Like::where('post_id',$post->id)->where('user_id',$userId)->first()?->reaction;
        $categories = [];
        foreach($post->categories as $category){
            array_push($categories,$category->id);
        }
        $posts = Post::whereHas('categories',function($q) use ($categories){
            $q->whereIn('id',$categories);
        })->where('id','<>',$post->id)->withCount(['likes' => function($q){
            $q->where('reaction',1);
        }])->having('likes_count','>',0)->orderBy('likes_count','desc')->take(5)->get();
        return view('frontend.post-details', compact('post', 'comments','likeCount','dislikeCount','reaction','posts'));
    }


    /**
     * like and dislike
    */
    public function like(Request $request)
    {
        try{
            $userId = Auth::user()->id;
            $attributes = $request->all();
            $attributes['user_id'] = $userId;
            $like = Like::where('post_id',$request->post_id)->where('user_id',$userId)->first();
            if($request->reaction == '' &&  $like != null){
                Like::where('id',$like->id)->delete();
            }

            if($request->reaction != '' && $like != null){
                $like->update($attributes);
            }
            if($request->reaction != '' && $like == null){
                Like::create($attributes);
            }

            $likeCount = Like::where('post_id',$request->post_id)->where('reaction',1)->count();
            $dislikeCount = Like::where('post_id',$request->post_id)->where('reaction',0)->count();
            return Response::json(['like'=>$likeCount,'dislike'=>$dislikeCount]);

        }catch(Exception $e){
            return Response::json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * About Page
    */
    public function about(){
        return view('frontend.about');
    }
}
