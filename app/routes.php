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

Route::get('products/{slug?}', array(
	'uses' 	=> 'ProductsController@index',
	'as' 	=> 'products',
));
Route::post('products', array(
	'uses' 	=> 'ProductsController@search',
	'as' 	=> 'products.search',
));

Route::controller('users', 'UserController');


Route::resource('groups', 'GroupController');




Route::filter('auth', function()
{
	if (!Sentry::check()) return Redirect::to('users/login');
});


Route::filter('admin_auth', function()
{
	if (!Sentry::check())
	{
		// if not logged in, redirect to login
		return Redirect::to('users/login');
	}


	if (!Sentry::getUser()->hasAccess('admin'))
	{
		// has no access
		return Response::make('Access Forbidden', '403');
	}
});





Route::resource('campaigns', 'CampaignsController');

Route::resource('jobs', 'JobsController');

Route::resource('admin.products', 'Admin\ProductsController');

Route::resource('feeds', 'FeedsController');