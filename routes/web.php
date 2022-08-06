<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['middleware' => 'pvb'])->group(function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/layout', 'HomeController@index')->name('layout');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 's', 'middleware' => ['teacher', 'auth', 'pvb']], function () {
    Route::get('dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});

Route::group(['prefix' => 'm', 'middleware' => ['student', 'auth', 'pvb']], function () {
    Route::get('dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});
