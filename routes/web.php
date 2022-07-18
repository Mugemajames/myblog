<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Http\Controllers\ContentsController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


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

Route::get('/', function () {
    return view('home'); 
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');


Route::resource('klab',ContentsController::class);
Route::post('/like-post/{id}',[ContentsController::class,'likePost'])->name('like.post');
Route::post('/unlike-post/{id}',[ContentsController::class,'unlikePost'])->name('unlike.post');
Route::get('follow/{id}',[ContentsController::class,'follow'])->name('follow');
Route::get('delete/{id}',[ContentsController::class,'unfollow'])->name('unfollow');
Route::get('deletemyaccount/{id}',[App\Http\Controllers\HomeController::class,'deletemyaccountfn']);
Route::get('manageusers',[App\Http\Controllers\HomeController::class,'viewusers'])->name('manageuser');
Route::get('deleteuseraccount/{id}',[App\Http\Controllers\HomeController::class,'deleteuseraccountfn']);

//send email
Route::get('/',[ContentsController::class,'myblog']);

