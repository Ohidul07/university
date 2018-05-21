<?php

Route::group(['middleware' => 'auth', 'prefix' => 'lms', 'namespace' => 'Modules\LMS\Http\Controllers'], function()
{
    Route::get('/', 'LMSController@index');
});
