<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ValidatorController;
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
    Route::get('beranda', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('latihan', [StudentController::class, 'exercise'])->name('student.exercise');
    Route::get('latihan/{id}', [StudentController::class, 'exercise_question'])->name('student.exercise.question');
    Route::get('latihan/q/{id}', [StudentController::class, 'exercise_question_detail'])->name('student.exercise.question.detail');
    Route::post('runtest', [ValidatorController::class, 'runtest'])->name('student.runtest');
    Route::post('submittest', [ValidatorController::class, 'submittest'])->name('student.submittest');
    Route::post('enroll', [StudentController::class, 'enroll'])->name('student.enroll.class');
});
