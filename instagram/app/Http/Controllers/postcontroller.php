<?php

namespace App\Http\Controllers;

use App\models\post;
use Illuminate\Http\Request;
use Image;
   
 
class postcontroller extends Controller

{     //verification authenticate user..

    public function __construct()
    {
        $this->middleware('auth');
    }
    // create new post in profile 
    public function create(){
        return view('posts.create');
    }

    //show index post in home view based on latest post ....
    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');  //Plunk = Laravel Collection Method to extract 
        $posts = post::whereIn('user_id', $users)->latest()->get();  //latest post show first in home view 
        return view('posts.index',compact('posts')); //compact is php function create an array from existing variables 
    }
 
    //create post ..

    public function store(){

        //validation .....
        $data=request()->validate([
 
            'caption' => 'required ',  
            'image' => ['required', 'image'],
        ]);

        //store image in uploads folder 
        $imagepath=(request('image')->store('uploads', 'public'));

        //resize image with Intervention Image library...
        $image = Image::make(public_path("storage/{$imagepath}"))->resize(1200,1200);
        $image ->save();
            
 
        //only auth. user can create post.....
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagepath,
        ]);
        
        return redirect('/profile/' . auth()->user()->id);
 
    }
    //show one post only ...
    public function show(\App\Models\post $post){
        return view('posts.show',compact('post'));
    }
  
}
