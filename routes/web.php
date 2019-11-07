<?php

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'HomeController@admin')->name('admin');
    Route::resource('courses', 'Admin\CourseController');
    Route::resource('lessons', 'Admin\LessonController');
    Route::resource('questions', 'Admin\QuestionController');
    Route::resource('option-answers', 'Admin\OptionAnswerController');
});
