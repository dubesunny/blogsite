<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Get Home Page
     */
    public function index()
    {
        $categories = Category::whereStatus('active')->limit(6)->get();
        $posts = Post::with(['categories','user'])->whereHas('categories',function($q){
            $q->where('status','active');
        })->whereHas('user',function($q){
            $q->where('status','active');
        })->whereStatus('published')->limit(6)->get();
        return view('frontend.index',compact('categories','posts'));
    }
}
