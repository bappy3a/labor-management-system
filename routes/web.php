<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
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

Route::group(['middleware'=>['auth'/*,'admin'*/]],function(){
	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/home', [HomeController::class, 'index']);
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
	Route::resource('labor', LaborController::class);
	Route::resource('project', ProjectController::class);
	Route::resource('project', ProjectController::class);
	Route::post('project/work', [ProjectController::class,'project_work'])->name('project.work');
	Route::resource('attendance', AttendanceController::class);
	Route::get('attendance/absent/{id}', [AttendanceController::class,'absent'])->name('attendance.absent');
	Route::get('attendance/present/{id}', [AttendanceController::class,'present'])->name('attendance.present');
	Route::resource('salary', SalaryController::class);
	Route::any('salary/model/shows', [SalaryController::class,'salarymodel'])->name('salary.model');
	Route::get('report/labor', [ReportController::class,'labor'])->name('report.labor');
	Route::get('report/project', [ReportController::class,'project'])->name('report.project');
	Route::get('report/salary', [ReportController::class,'salary'])->name('report.salary');
});