<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\blog;
use App\Models\User;
use App\Models\Role;
use App\Models\user_role;

class authController extends Controller
{
    function home(){
        if(Auth::check()){
            return redirect(route('viewBlog'));
        }  
        else{
            return view('home');
        } 
    }

    function login(){
        if(Auth::check()){
            return redirect(route('viewBlog'));
        }  
        else{
            return view('login')->with('error','Invalid Credentials');
        } 
    }

    function register(){
        $roles = Role::all();
        return view('register')->with(compact('roles'));
    }

    function loginPost(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            if(in_array('admin', Auth::user()->roles()->pluck('name')->toArray()) == 1){
                return redirect(route('viewBlog'))->with('success','admin man');
            }
            else{
                return redirect(route('viewBlog'))->with('success','user man');
            }
        }
        else{
            return redirect()->back();
        }
    }

    function registerPost(Request $request){
        
        $request->validate([
            'email'=> 'unique:Users'
        ]);

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = $request->password;

        if($created = (User::create($user))){
            $user = User::find($created->id);
            $user->roles()->attach($request->role);
            return redirect(route('login'))->with('success','Registration successful');
        }
        else{
            echo('user not saved');
        }
    }

    function logout(){
        session()->flush();
        return redirect(route('home'));
    }
}
