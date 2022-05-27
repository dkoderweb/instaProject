<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];
    // protected $fillable = ['caption'];

    //One To Many (Inverse) / Belongs To relation with user model...
    public function user(){
        return $this->belongsTo(User::class, 'User_id');
    }
    
    //One To Many (Inverse) / Belongs To relation with comments model...
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //One To Many (Inverse) / Belongs To relation with like model...
    public function like()
    {
        return $this->hasMany(Like::class);
    }

    
    
}
