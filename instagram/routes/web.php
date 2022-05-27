<?php

use Illuminate\Support\Facades\Route;
use App\Models\post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 

Auth::routes();

//post Route

Route::get('/',[App\Http\Controllers\postcontroller::class, 'index']); 
Route::get('/p/create', [App\Http\Controllers\postcontroller::class, 'create']); 
Route::post('p', [App\Http\Controllers\postcontroller::class, 'store']);
Route::get('/p/{post}', [App\Http\Controllers\postcontroller::class, 'show']);
Route::post('/p/{post}', [App\Http\Controllers\postcontroller::class, 'updatelikes'])->name('post.update');  

// profile Route

Route::any('/search', [App\Http\Controllers\profilecontaroller::class, 'search'])->name('profile.search');  
Route::get('/profile/{user}', [App\Http\Controllers\profilecontaroller::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\profilecontaroller::class, 'edit'])->name('profile.edit');  
Route::patch('/profile/{user}', [App\Http\Controllers\profilecontaroller::class, 'update'])->name('profile.update');

// Comment Route

Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');

//like Route 

Route::post('/like/{like}', [App\Http\Controllers\LikeController::class, 'like']);

// Follow Route

Route::post('follow/{user}', [App\Http\Controllers\followscontroller::class, 'store'] );


//Default route 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
