<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HIveController;


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
//public routes
Route::get('/sites/{name}',[siteController::class,'search']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);




//protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {

    Route::get('/sites',[siteController::class,'index']);
    Route::get('/sites/{id}',[siteController::class,'show']);
    Route::post('/sites',[siteController::class,'store']);
    Route::put('/sites/{id}',[siteController::class,'update']);
    Route::delete('/sites/{id}',[siteController::class,'destroy']);

    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/hives',[HiveController::class,'index']);
    Route::get('/hivess/{id}',[HiveController::class,'show']);
    Route::post('/hives',[HiveController::class,'store']);
    Route::put('/hives/{id}',[HiveController::class,'update']);
    Route::delete('/hives/{id}',[HiveController::class,'destroy']);


});
