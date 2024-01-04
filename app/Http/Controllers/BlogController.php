<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\blog;

class BlogController extends Controller
{
    function viewBlog(){
        if(Auth::check()){
            return view('viewBlog');
        }  
        else{
            return redirect(route('home'));
        }  
    }

    function blogCreate(Request $request){
        $request->validate([
            'title' => ['required', function($attribute, $value, $fail) {
                if(preg_match('/[!@#$%^&*(),.?":{}|\/\-\+\|\[\]<>0-9]/', $value)) {
                    $fail("The $attribute cannot contain special characters or numbers.");
                }
                if(preg_match("/\'/", $value)){
                    $fail("The $attribute cannot contain special characters or numbers.");
                }
            }],
            'description' => ['required'],
        ]);

        $blog['creator'] = Auth::user()->id;
        $blog['title'] = $request->title;
        $blog['description'] = $request->description;
        
        if($request->file('image') !== null){
            $nameData = asset('storage/blog').'/'.date("Y-m-d",time()).'-'.time().'-blog-'.$request->file('image')->getClientOriginalName();
            $name = date("Y-m-d",time()).'-'.time().'-blog-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/public/blog', $name);
            $blog['image'] = $nameData;
        }

        if(blog::create($blog)){
            return redirect()->back();
        }
    }

    function showBlogs(Request $request){
        $blogs = blog::all();
        return view('showBlogs')->with(compact('blogs'));
    }

    function myBlogs(Request $request){
        $user = Auth::user()->id;
        $blogs = blog::where('creator','=',$user)->get();
        return view('my-blogs')->with(compact('blogs'));
    }

    function editBlogs(Request $request, $id){
        $request->validate([
            'title' => ['required', function($attribute, $value, $fail) {
                if(preg_match('/[!@#$%^&*(),.?":{}|\/\-\+\|\[\]<>0-9]/', $value)) {
                    $fail("The $attribute cannot contain special characters or numbers.");
                }
                if(preg_match("/\'/", $value)){
                    $fail("The $attribute cannot contain special characters or numbers.");
                }
            }],
        ]);


        $blog = blog::find($id);
    
        if($request->file('image') !== null){
            $nameData = asset('storage/blog').'/'.date("Y-m-d",time()).'-'.time().'-blog-'.$request->file('image')->getClientOriginalName();
            $name = date("Y-m-d",time()).'-'.time().'-blog-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/public/blog', $name);
            $blog['image'] = $nameData;
        }
        
        $blog->title = $request->title ?? $blog->title;
        $blog->description = $request->description ?? $blog->description;

        if($blog->save()){
            return redirect(route('myBlogs'));
        }
        else{
            echo 'could not save';
        }
    }
    
    function showEdit($id){
        $blog = blog::find($id);
        return view('show-Edit')->with(compact('blog'));
    }

    function deleteBlogs($id){
        $blog = blog::find($id);
        $blog->delete();
        return redirect(route('myBlogs'));
    }

}
