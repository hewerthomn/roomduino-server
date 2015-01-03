<?php
Route::group(['namespace' => 'App\Controllers'], function()
{
	Route::get('/', function()
	{
		return 'Welcome!';
	});

	Route::get('monitor', 'HomeController@app');
});

Route::group(['prefix' => 'api', 'namespace' => 'App\Controllers\Api'], function()
{
	Route::controller('temperatures', 'TemperaturesController');
});
