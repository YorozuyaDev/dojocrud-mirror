<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonsmediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AjaxController;
use App\Http\Middleware\RequireRole;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::resource('user',UserController::class);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('lessonsmedia',LessonsmediaController::class);
Route::resource('course',CourseController::class);
Route::resource('enrolment',EnrolmentController::class);
Route::resource('lesson', LessonController::class);

//Prueba Ajax

// Route::get('miJqueryAjax','AjaxController@index');
// Route::get('/ajax', function () {
//           return view('master');
//         });