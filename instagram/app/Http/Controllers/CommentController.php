<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Comment;
use Auth;

class CommentController extends Controller


{
    public function store(Request $request)
    {   
        //store comment in mysql...accordingly post_id

        $post = post::findOrFail($request->post_id);

        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

         

        return redirect('/'); 
    }

}
