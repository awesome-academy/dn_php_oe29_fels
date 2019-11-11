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
    Route::get('/course/{course_id}/lessons', 'Front\LessonController@getListsByCourse')->name('lessons.list-by-course');
    Route::get('/lesson/{lesson_id}/result', 'Front\LessonController@getResult')->name('lessons.get-result');
    Route::get('/lesson/{lesson_id}/words', 'Front\LessonController@getWords')->name('lessons.get-words');
    Route::post('user-lessons', 'Front\UserLessonController@store')->name('user-lessons.store');
    Route::get('/lesson/{lesson_id}/question', 'Front\LessonController@getEachQuestion')->name('lessons.get-each-question');
    Route::post('/choice', 'Front\ChoiceController@store')->name('choices.store');
    Route::get('/profile', 'Front\ProfileController@show')->name('profiles.show');
    Route::get('/profile/edit', 'Front\ProfileController@edit')->name('profiles.edit');
    Route::put('/profile/update/{id}', 'Front\ProfileController@update')->name('profiles.update');
    Route::get('/profile/change-password', 'Front\ProfileController@changePassword')->name('profiles.change_password');
    Route::put('/profile/change-password', 'Front\ProfileController@updateChangePassword')->name('profiles.update_change_password');
    Route::get('/words', 'Front\WordController@index')->name('words.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'HomeController@admin')->name('admin');
    Route::resource('courses', 'Admin\CourseController');
    Route::resource('lessons', 'Admin\LessonController');
    Route::resource('questions', 'Admin\QuestionController');
    Route::resource('option-answers', 'Admin\OptionAnswerController');
});
