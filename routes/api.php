<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\Search;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


route::middleware('auth:api')->resource('/Members', MemberController::class);
route::middleware('auth:api')->post('/logout',[UserController::class,'logout']);
Route::resource('Books', BookController::class);
// Route::resource('Members', MemberController::class);
route::get('/search/{info}',[Search::class,'search']);

route::post('/register',[UserController::class,'register']);
route::post('/login',[UserController::class,'login']);
// route::post('/login',[UserController::class,'login']);


