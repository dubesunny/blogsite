<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('user')->get();
        return view('admin.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        try {
            $attributes = $request->validated();
            $attributes['status'] = "approved";
            $attributes['user_id'] = Auth::user()->id;
            Comment::create($attributes);
            if ($request->ajax()) {
                return Response::json(['success' => 'Comment added successfully']);
            }
            return back()->with('success', 'Comment added successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        try {
            $comment->update(['comment' => $request->comment]);
            return Response::json(['success' => 'Comment added successfully']);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            return Response::json(['success' => 'Comment deleted successfully']);
        } catch (Exception $e) {
            return Response::json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update status of comment
    */
    public function updateStatus(Request $request){
        try{
            Comment::where('id',$request->id)->update(['status' => $request->status]);
            return Response::json(['success' => 'Comment updated successfully']);
        }catch(Exception $e){
            return Response::json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Get Comments By Filter
    */
    public function getCommentByFilter(Request $request){
         try{
            if($request->filter != ''){
              $comments = Comment::with('user')->whereStatus($request->filter)->get();
            }else{
              $comments = Comment::with('user')->get();
            }
            return view('admin.comment.table',compact('comments'));
        }catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()]);
         }

    }
}
