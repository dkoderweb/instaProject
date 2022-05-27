<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Like;

class LikeController extends Controller
{
    //store like in mysql 
    public function like($id)
    {

        $user = Auth::User();

        $like = Like::where('user_id', $user->id)->where('post_id', $id)->first();
        
        //Remove if post is already liked
        if ($like) {
            $like->State = !$like->State;
            $like->save();
        } 
        //else create like new 
        else {
            $like = Like::create([
                "user_id" => $user->id,
                "post_id" => $id,
                "State" => true

            ]);
        }

        //And redirect to home 

        return redirect('/');
    }
}
