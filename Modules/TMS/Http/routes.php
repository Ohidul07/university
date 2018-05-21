<?php

Route::group(['middleware' => 'web', 'prefix' => 'tms', 'namespace' => 'Modules\TMS\Http\Controllers'], function()
{
    Route::get('/', 'TMSController@index');
    Route::get('approved-teacher','TMSController@approved')->name('approved-teacher');
    Route::get('approving-teacher/{id}','TMSController@approving')->name('approving-teacher');
    Route::get('pending-teacher','TMSController@pending')->name('pending-teacher');
    Route::get('teacher-edit/{id}','TMSController@edit')->name('teacher-edit');
    Route::post('teacher-update/{id}','TMSController@update')->name('teacher-update');
    Route::get('teacher-view/{id}','TMSController@view')->name('teacher-view');
    Route::get('teacher-delete/{id}','TMSController@destroy')->name('teacher-delete');
});
