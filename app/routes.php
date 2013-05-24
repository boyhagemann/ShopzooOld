<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('jobs/run', array(
	'uses' 	=> 'JobsController@run',
	'as' 	=> 'jobs.run',
));
Route::get('feeds/import/{campaignId}', array(
	'uses' 	=> 'FeedsController@import',
	'as' 	=> 'feeds.import',
));
Route::post('products/import', array(
	'uses' 	=> 'ProductsController@import',
	'as' 	=> 'products.import',
));



Route::resource('campaigns', 'CampaignsController');

Route::resource('jobs', 'JobsController');

Route::resource('products', 'ProductsController');

Route::resource('feeds', 'FeedsController');