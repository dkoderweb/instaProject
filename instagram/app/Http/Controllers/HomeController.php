<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //verification authenticate user..

    public function __construct()
    {
        $this->middleware('auth');
    }

     
    public function index()
    {
        return view('home');
    }
}
