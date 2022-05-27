<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'post_id'];

    //One To Many (Inverse) / Belongs To relation with post model.... we can back, ex.= return = $comment->post->username....
    public function post()
    {
        return $this->belongsTo(post::class);
    }

    //One To Many (Inverse) / Belongs To relation with user model....
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
