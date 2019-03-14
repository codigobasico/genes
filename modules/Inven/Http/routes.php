<?php

Route::group(['middleware' => 'web', 'prefix' => 'inven', 'namespace' => 'Modules\Inven\Http\Controllers'], function()
{
    Route::get('/', 'InvenController@index');
});
