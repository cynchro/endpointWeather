<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WheatherController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => ['jwt.verify']], function() {

Route::post('/authuser', [userController::class, 'authUser']);
Route::post('/register', [userController::class, 'register']);
Route::post('/fetch', [WheatherController::class, 'fetch']);

});

Route::post('/authenticate', [userController::class, 'authenticate']);