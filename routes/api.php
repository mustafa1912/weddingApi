<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/slider', [\App\Http\Controllers\Api\ApiController::class,'slider']);
Route::get('/Portfolio', [\App\Http\Controllers\Api\ApiController::class,'Portfolio']);
Route::get('/Price', [\App\Http\Controllers\Api\ApiController::class,'Price']);
Route::get('/client', [\App\Http\Controllers\Api\ApiController::class,'client']);
Route::get('/team', [\App\Http\Controllers\Api\ApiController::class,'team']);
Route::get('/artical', [\App\Http\Controllers\Api\ApiController::class,'artical']);
Route::get('/companySetting', [\App\Http\Controllers\Api\ApiController::class,'setting']);


Route::post('/store', [\App\Http\Controllers\Api\ApiController::class,'store']);


