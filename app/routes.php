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


Route::get('import/tradetracker/feed/{campaignId}', array(
	'uses' 	=> 'Import\TradeTrackerController@feed',
	'as' 	=> 'import.tradetracker.feed',
));
Route::post('import/tradetracker/product', array(
	'uses' 	=> 'Import\TradeTrackerController@product',
	'as' 	=> 'import.tradetracker.product',
));



Route::resource('campaigns', 'CampaignsController');

Route::resource('jobs', 'JobsController');

Route::resource('products', 'ProductsController');

Route::resource('feeds', 'FeedsController');