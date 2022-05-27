<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = [];
    

    //if there is no image ....
    public function getProfileImage(){
        return ($this->image) ? "/storage/$this->image" : "img/default.png"; //show default profile image .....
    }

    //Many To Many Relationships with user model 
    public function followers(){
        return $this->belongsToMany(User::class);
    }
    //One To Many (Inverse) / Belongs To relation with user model 
    public function user(){
        return $this -> belongsTo(User::class);
    }
 }
