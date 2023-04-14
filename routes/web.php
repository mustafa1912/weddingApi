<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
Route::group(['as' => 'admin.', 'prefix' => 'admin/'], function () {
    Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
    Route::post('login.store', 'App\Http\Controllers\LoginController@loginStore')->name('login.store');
    Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('dashboard');

//   ------------------- slider -----------------
    Route::get('/slider', [\App\Http\Controllers\SliderController::class,'index'])->name('slider');
    Route::get('/Portfolio', [\App\Http\Controllers\SliderController::class,'Portfolio'])->name('Portfolio');
    Route::get('/Price', [\App\Http\Controllers\SliderController::class,'Price'])->name('Price');
    Route::get('/client', [\App\Http\Controllers\SliderController::class,'client'])->name('client');
    Route::get('/team', [\App\Http\Controllers\SliderController::class,'team'])->name('team');
    Route::get('/artical', [\App\Http\Controllers\SliderController::class,'artical'])->name('artical');
    Route::get('/companySetting', [\App\Http\Controllers\SliderController::class,'setting'])->name('setting');
    Route::get('/categoury', [\App\Http\Controllers\SliderController::class,'categoury'])->name('categoury');




});
