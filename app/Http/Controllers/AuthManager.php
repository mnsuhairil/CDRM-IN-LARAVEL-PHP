<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
            use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function register(){
        return view('register');
    }

    function loginPost(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));   
        }
        return redirect(route('login'))->with('fail','Incorrect credentials');
    }

    function registerPost(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:20'
        ]);
        $data['name']=$request->name;
    $data['email']=$request->email;
    $data['password']=Hash::make($request->password);
    $user=User::create($data);
        if(!$user){
            return redirect(route('register'))->with('fail','Something went wrong');
        }
        return redirect(route('login'))->with('success','User created successfully');
    }

    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

}