<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('status','active')->get();
        $categories = Category::where('status','active')->get();
        return view('admin.post.create',compact('users','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try{
            $attributes = $request->validated();
            $attributes['slug'] = Str::slug($attributes['title']);
            $attributes['image'] = $request->file('image')->store('posts');
            unset($attributes['category_id']);
            $post = Post::create($attributes);
            $post->categories()->attach($request->category_id);
            return redirect()->route('post.index')->with('success','Post created successfully');
        }catch(Exception $e){
            return redirect()->route('post.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $users = User::where('status','active')->get();
        $categories = Category::where('status','active')->get();
        $post->load('categories');
        return view('admin.post.edit',compact('users','categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
       try{
         $attributes = $request->validated();
         $attributes['slug'] = Str::slug($attributes['title']);
         if($post->getRawOriginal('image') != ''){
            $imagePath = public_path('storage/'.$post->getRawOriginal('image'));
            if($request->hasFile('image')){
                unlink($imagePath);
                $attributes['image'] = $request->file('image')->store('posts');
            }
         }else{
            if($request->hasFile('image')){
               $attributes['image'] = $request->file('image')->store('posts');
            }
         }
         unset($attributes['category_id']);
         $post->update($attributes);
         $post->categories()->sync($request->category_id);
         return redirect()->route('post.index')->with('success','Post updated successfully');
       }catch(Exception $e){
         return redirect()->route('post.index')->with('error',$e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
       try{
         if($post->getRawOriginal('image') != ''){
            $imagePath = public_path('storage/'.$post->getRawOriginal('image'));
            unlink($imagePath);
         }
         $post->categories()->detach();
         $post->delete();
         return response()->json(['success' => 'Post deleted successfully']);
       }catch(Exception $e){
         return response()->json(['error' => $e->getMessage()]);
       }
    }

    public function getPostByFilter(Request $request){
         try{
            if($request->filter != ''){
                $posts = Post::whereStatus($request->filter)->get();
            }else{
                $posts = Post::all();
            }
            return view('admin.post.table',compact('posts'));
        }catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()]);
         }
    }
}
