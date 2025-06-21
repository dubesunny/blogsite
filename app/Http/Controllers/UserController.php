<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $attributes = $request->validated();
            User::create($attributes);
            return response()->json(['success'=>'User Added Successfully']);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $attributes = $request->validated();
            if($attributes['password'] == null) {
                unset($attributes['password']);
            }
            $user->update($attributes);
            return response()->json(['success'=>'User updated successfully']);
        }catch(Exception $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       try{
        $user->delete();
        return response()->json(['success'=> 'User Deleted Successfully']);
       }catch(Exception $e) {
        return response()->json(['error'=> $e->getMessage()]);
       }
    }
}
