<?php

Route::group(['middleware' => 'web', 'prefix' => 'sms', 'namespace' => 'Modules\SMS\Http\Controllers'], function()
{
    Route::get('/', 'SMSController@index');

    Route::get('approved-student','SMSController@approved')->name('approved-student');
	Route::get('pending-student','SMSController@pending')->name('pending-student');
	Route::get('approving-student/{id}','SMSController@approving')->name('approving_student');
	Route::get('student-edit/{id}','SMSController@edit')->name('student-edit');
	Route::post('student-update/{id}','SMSController@update')->name('student-update');
	Route::get('student-view/{id}','SMSController@view')->name('student-view');
	Route::get('student-delete/{id}','SMSController@destroy')->name('student-delete');
});
