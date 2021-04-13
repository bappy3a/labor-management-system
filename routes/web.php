<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\ProjectController;
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
	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/home', [HomeController::class, 'index']);
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
	Route::resource('labor', LaborController::class);
	Route::resource('project', ProjectController::class);
	Route::post('project/work', [ProjectController::class,'project_work'])->name('project.work');
});