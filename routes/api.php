<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use Illuminate\Http\Request;
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
// Public routes
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('school',[SchoolController::class,'index']);
Route::get('school/{id}',[SchoolController::class,'show']);
Route::get('school/search/{id}',[SchoolController::class,'search']);

// Protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('school',[SchoolController::class,'store']);
    Route::put('school/{id}',[SchoolController::class,'update']);
    Route::delete('school/{id}',[SchoolController::class,'destroy']);
    Route::post('logout',[AuthController::class,'logout']);
});