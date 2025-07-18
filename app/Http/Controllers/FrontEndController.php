<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    /**
     * Get Home Page
     */
    public function index()
    {
        $categories = Category::whereStatus('active')->limit(6)->get();
        $posts = Post::with(['categories' => function($q){
            $q->where('status','active');
        } , 'user' => function($q){
              $q->where('status','active');
        }])->whereStatus('published')->latest()->cursorPaginate(6);
        return view('frontend.index', compact('categories', 'posts'));
    }

    /**
     * Specific category page
     */
    public function categories(Category $category)
    {
        $posts = Post::with('user')->whereHas('categories', function ($q) use ($category) {
            $q->where('id', $category->id);
        })->where('status', 'published')->paginate(6);
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
        $comments = Comment::with(['replies', 'user'])->where('post_id', $post->id)->where('parent_id', null)->latest()->get();
        return view('frontend.post-details', compact('post', 'comments'));
    }

    /**
     * Comment
     */
    public function comment(CommentRequest $request)
    {
        try {
            $attributes = $request->validated();
            $attributes['user_id'] = Auth::user()->id;
            Comment::create($attributes);
            return back()->with('success', 'Comment added successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
