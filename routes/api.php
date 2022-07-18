<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//blog functionalities to api return json data
//Route::get('viewuser',[ContentsController::class,'index']);
//Route::resource('klab',ContentsController::class);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
