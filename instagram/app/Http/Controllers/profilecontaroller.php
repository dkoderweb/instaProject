<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Image;

class profilecontaroller extends Controller
{
    //show profile ...
    public function index(User $user)
    {
        // dd($user);
        // dd(User::find($user));
        
        //auth user can follow user_id 
         $follows =(auth()->user()) ? auth()->user()->following->contains($user->id) : false; //only login user follow ..
        return view('profiles.index',compact('user', 'follows'));//compact is php function create an array from existing variables 
    }
    //redirect to edit view 
    public function edit(User $user){

        $this->authorize('update' , $user->profile);
        return view('profiles.edit',compact('user'));
    }

    //edit profile.....
    public function update(User $user){
        $this->authorize('update' , $user->profile);
        

        //validation ....
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'required',
            'image'=>'',

        ]);
        
        //Maybe if there is a image update request .....
        if(request('image')){
            $imagepath=(request('image')->store('profile', 'public'));
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000,1000);
            $image ->save();
            $imagearray = ['image'=>$imagepath];
        }
        // dd(array_merge(
        //     $data,
        //     ['image'=>$imagepath]
        // ));
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imagearray ?? [],//image is nullable 
            
        ));

        return redirect("/profile/{$user->id}");
    }

    //search function ...
    public function search(Request $request)
    {   //any username can search ....
        $q = $request->input('q');
        $user = User::where('username', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        if (count($user) > 0)
            return view('profiles.search')->withDetails($user)->withQuery($q);

        //if there in no result..
        return view('profiles.search')->withMessage('No results found.');
    }
    
}
