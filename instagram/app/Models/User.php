<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',

        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //You can override the default behavior using boot()....
    public static function boot(){
        parent::boot();
        static::created(function ($user){
            $user->profile()->create([
                'title'=>$user->username,  //error show title can not be nullable....
            ]);
        });
    }

    //One To One relation profile with profile model ...//user have only one profile 
    public function profile(){
        return $this->hasOne(profile::class);
    }

    //Many To Many Relationships with profile model ....//user have many followers and following 
    public function following(){
        return $this->belongsToMany(profile::class);
    }
    //user have many post //one to many relation 
    public function posts(){
        return $this->hasMany(post::class)->orderBy('created_at', 'DESC');
    }
    //one to many relation ...//user have many like in post....
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    

    //there is telescope in providers folder ................

}
