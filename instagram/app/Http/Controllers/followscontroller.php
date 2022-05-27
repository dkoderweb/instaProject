<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class followscontroller extends Controller
{
    //verification authenticate user..
    public function __construct(){
        $this->middleware('auth');
    }
    //following count in profile view based on user model ...
    public function store(User $user){
         
        return auth()->user()->following()->toggle($user->profile);
    }
}
