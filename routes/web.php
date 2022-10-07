<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
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

Route::group(['prefix' => 'a', 'middleware' => ['admin', 'auth', 'pvb']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('year', [AdminController::class, 'year'])->name('admin.year');
    Route::get('year-list', [AdminController::class, 'yearList'])->name('admin.year.list');
    Route::post('year-add', [AdminController::class, 'yearAdd'])->name('admin.year.add');
    Route::get('year-detail', [AdminController::class, 'yearDetail'])->name('admin.year.detail');
    Route::post('year-update', [AdminController::class, 'yearUpdate'])->name('admin.year.update');

    Route::get('class', [AdminController::class, 'class'])->name('admin.class');
    Route::get('class/{id}', [AdminController::class, 'classDetail'])->name('admin.class.detail');
    Route::get('class-student', [AdminController::class, 'classStudent'])->name('admin.class.student');
});

Route::group(['prefix' => 's', 'middleware' => ['teacher', 'auth', 'pvb']], function () {
    Route::get('dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

    //Soal
    Route::get('questions', [TeacherController::class, 'questions'])->name('teacher.questions');
    Route::get('questions-list', [TeacherController::class, 'questionsList'])->name('teacher.questions.list');
    
    Route::get('questions-detail', [TeacherController::class, 'detailQuestion'])->name('teacher.questions.detail');
    Route::post('add-question', [TeacherController::class, 'addQuestion'])->name('teacher.questions.add');
    Route::post('update-question', [TeacherController::class, 'updateQuestion'])->name('teacher.questions.update');

    Route::get('exercises', [TeacherController::class, 'exercises'])->name('teacher.exercises');
    Route::get('exercises-list', [TeacherController::class, 'exercisesList'])->name('teacher.exercises.list');
    Route::post('exercises-add', [TeacherController::class, 'exercisesAdd'])->name('teacher.exercises.add');
    Route::get('exercises-detail', [TeacherController::class, 'exercisesDetail'])->name('teacher.exercises.detail');
    Route::post('exercises-update', [TeacherController::class, 'exercisesUpdate'])->name('teacher.exercises.update');

    Route::get('exercises-result', [TeacherController::class, 'exercisesResult'])->name('teacher.exercises.result');
});

Route::group(['prefix' => 'm', 'middleware' => ['student', 'auth', 'pvb']], function () {
    Route::get('home', [StudentController::class, 'dashboard'])->name('student.dashboard');

    //Latihan
    Route::get('latihan', [StudentController::class, 'exercise'])->name('student.exercise');
    Route::get('latihan/{id}', [StudentController::class, 'exercise_question'])->name('student.exercise.question');
    Route::get('latihan/{exercise_id}/{question_no}', [StudentController::class, 'exercise_question_detail'])->name('student.exercise.question.detail');

    //Tugas
    Route::get('tugas', [StudentController::class, 'task'])->name('student.task');
    Route::get('tugas/{id}', [StudentController::class, 'task_question'])->name('student.task.question');
    Route::get('tugas/{task_id}/{question_id}', [StudentController::class, 'task_question_detail'])->name('student.task.question.detail');

    //Ujian
    Route::get('ujian', [StudentController::class, 'exam'])->name('student.exam');
    Route::get('ujian/{id}', [StudentController::class, 'exam_question'])->name('student.exam.question');
    Route::get('ujian/{exam_id}/{question_id}', [StudentController::class, 'exam_question_detail'])->name('student.exam.question.detail');

    Route::post('runtest', [ValidatorController::class, 'runtest'])->name('student.runtest');
    Route::post('submittest', [ValidatorController::class, 'submittest'])->name('student.submittest');

    //Hasil
    Route::get('result-list', [StudentController::class, 'resultList'])->name('student.result.list');
    Route::get('exercise-result/{id}', [StudentController::class, 'exerciseResult'])->name('student.exercise.result');
    Route::get('exercise-result-detail', [StudentController::class, 'exerciseResultDetail'])->name('student.exercise.result.detail');
});
