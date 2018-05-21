<?php

Route::group(['middleware' => 'web', 'prefix' => 'rms', 'namespace' => 'Modules\RMS\Http\Controllers'], function()
{
    Route::get('/', 'RMSController@index');
});
