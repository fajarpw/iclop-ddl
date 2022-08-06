<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
})->name('layout');

Route::get('/student', function () {
    return view('student.dashboard');
})->name('student');