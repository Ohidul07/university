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

