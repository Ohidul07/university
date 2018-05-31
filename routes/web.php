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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//course controller
Route::get('/courses', 'courseController@create')->name('courses');
Route::post('/courses/store', 'courseController@store')->name('course_store');
Route::get('/courses/informations', 'courseController@course_informations')->name('course_informations');

//examination controller
Route::get('/examinations', 'examController@create')->name('examinations');
Route::post('/examinations/store', 'examController@store')->name('examination_store');
Route::get('/examinations/informations', 'examController@exam_informations')->name('examination_informations');

//mark controller

Route::get('/marks', 'markController@select_exam')->name('marks');
Route::get('/marks_entry', 'markController@mark_entry')->name('marks_entry');
Route::post('/marks_store', 'markController@store')->name('marks_store');
Route::get('/marks_show', 'markController@mark_show')->name('marks_show');



