<?php

use App\Http\Controllers\LaborController;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['register' => false]);
Auth::routes();

Route::group(['middleware'=>['auth']],function(){
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
	Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
	Route::resource('labor', LaborController::class);
});