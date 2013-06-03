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




Route::model('product', 'Product');
Route::get('products/{slug?}', array(
	'uses' 	=> 'ProductsController@index',
	'as' 	=> 'products',
));
Route::post('products', array(
	'uses' 	=> 'ProductsController@search',
	'as' 	=> 'products.search',
));

Route::get('products/show/{product}', array(
	'uses' 	=> 'ProductsController@show',
	'as'	=> 'products.show',
));
Route::get('products/redirect/{code}', array(
	'uses' 	=> 'ProductsController@redirect',
	'as'	=> 'products.redirect',
));




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


Route::controller('users', 'UserController');

Route::get('user/dashboard', array(
	'uses' 	=> 'UserController@dashboard',
	'as'	=> 'user.dashboard'
));
Route::get('user/login', array(
	'uses' 	=> 'UserController@login',
	'as'	=> 'user.login'
));
Route::post('user/auth', array(
	'uses' 	=> 'UserController@auth',
	'as'	=> 'user.auth'
));
Route::get('user/register', array(
	'uses' 	=> 'UserController@register',
	'as'	=> 'user.register'
));
Route::post('user/store', array(
	'uses' 	=> 'UserController@store',
	'as'	=> 'user.store'
));
Route::get('user/logout', array(
	'uses' 	=> 'UserController@logout',
	'as'	=> 'user.logout'
));







$menu = Menu::handler('main', array('class' => 'nav'));
$menu->add('', 'Homepage');
$menu->add('products', 'Products');

$menuLogin = Menu::handler('login', array('class' => 'nav pull-right'));
$menuLogin->add(URL::route('user.login'), 'Login');
$menuLogin->add(URL::route('user.register'), 'Register');

$menuUser = Menu::handler('user', array('class' => 'nav pull-right'));
$menuUser->add(URL::route('user.logout'), 'Log out');




Route::resource('groups', 'GroupController');

Route::resource('campaigns', 'CampaignsController');

Route::resource('jobs', 'JobsController');

Route::resource('admin.products', 'Admin\ProductsController');

Route::resource('feeds', 'FeedsController');