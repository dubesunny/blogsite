<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginCredentialsRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(){
        return view('authentication.login');
    }

    public function attempt(LoginCredentialsRequest $request){
        try{
            if(Auth::attempt($request->only(['email','password']),$request->remember)){
                if(Auth::user()->status != 'active'){
                    Auth::logout();
                    $request->session()->flush();
                    return redirect('/login')->with('error','Login Failed');
                }else{
                    return redirect('/')->with('success','Welcome Back!');
                }
            }else{
                return back()->withErrors(['email'=> 'The provided credentials do not match our records'])->onlyInput('email');
            }
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function forgotPassword(){
        return view('authentication.forgot-password');
    }

    public function sendPasswordResetLink(ForgotPasswordRequest $request){
        try{
            $email = $request->validated();
            $status = Password::sendResetLink(
                $email
            );

            return $status === Password::ResetLinkSent
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email'=>  __($status)]);
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function passwordReset(String $token){
        return view('authentication.reset-password',['token' => $token]);
    }
    public function register(){
        return view('authentication.register');
    }

    public function registerAttempt(RegisterRequest $request){
        try{
            $attributes = $request->validated();
            $user = User::create($attributes);
            Auth::login($user);
            return redirect('/')->with('success','Welcome to Our Site');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(){
        try{
            Auth::logout();
            return redirect('/');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
