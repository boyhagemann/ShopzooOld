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



/**
 * Models
 */
Route::model('product', 'Product');
Route::model('transaction', 'Transaction');



/**
 * Jobs
 */
Route::get('jobs/run', array(
	'uses' 	=> 'JobsController@run',
	'as' 	=> 'jobs.run',
));

/**
 * Imports
 */
Route::get('import/tradetracker/feed/{campaignId}', array(
	'uses' 	=> 'Import\TradeTrackerController@feed',
	'as' 	=> 'import.tradetracker.feed',
));
Route::post('import/tradetracker/product', array(
	'uses' 	=> 'Import\TradeTrackerController@product',
	'as' 	=> 'import.tradetracker.product',
));
Route::get('import/tradetracker/conversions', array(
	'uses' 	=> 'Import\TradeTrackerController@conversions',
	'as' 	=> 'import.tradetracker.conversions',
));


/**
 * Products
 */
Route::get('products/{slug?}', array(
	'uses' 	=> 'ProductsController@index',
	'as' 	=> 'products',
));
Route::post('products', array(
	'uses' 	=> 'ProductsController@search',
	'as' 	=> 'products.search',
));
Route::get('products/redirect/{code}', array(
	'uses' 	=> 'ProductsController@redirect',
	'as'	=> 'products.redirect',
));


/**
 * Users
 */
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




/**
 * Filters
 */
Route::filter('auth', function()
{
	if (!Sentry::check())
	{
		// if not logged in, redirect to login
		return Redirect::route('user.login');
	}
});
Route::filter('admin_auth', function()
{
	if (!Sentry::check())
	{
		// if not logged in, redirect to login
		return Redirect::route('user.login');
	}

	if (!Sentry::getUser()->hasAccess('admin'))
	{
		// has no access
		return Response::make('Access Forbidden', '403');
	}
});





Route::group(array('before' => 'auth'), function()
{
	/**
	 * Users
	 */
	Route::get('user/dashboard', array(
		'uses' 	=> 'UserController@dashboard',
		'as'	=> 'user.dashboard'
	));
	Route::get('user/logout', array(
		'uses' 	=> 'UserController@logout',
		'as'	=> 'user.logout'
	));

	/**
	 * Products
	 */
	Route::get('products/show/{product}', array(
		'uses' 	=> 'ProductsController@show',
		'as'	=> 'products.show',
	));

	/**
	 * Transactions
	 */
	Route::get('transactions', array(
		'uses' 	=> 'TransactionsController@index',
		'as' 	=> 'transactions',
	));

	/**
	 * Advices
	 */
	Route::get('advices', array(
		'uses' 	=> 'AdvicesController@index',
		'as' 	=> 'advices',
	));

});


/**
 * Menu
 */
$menu = Menu::handler('main', array('class' => 'nav'));
$menu->add('', 'Homepage');
$menu->add('products', 'Products');

if(Sentry::check()) {

	$menu->add('transactions', 'Transactions');
	$menu->add('advices', 'Advices');

	$menuUser = Menu::handler('user', array('class' => 'nav pull-right'));
	$menuUser->add(URL::route('user.logout'), 'Log out');
}
else {

	$menuUser = Menu::handler('user', array('class' => 'nav pull-right'));
	$menuUser->add(URL::route('user.login'), 'Login');
	$menuUser->add(URL::route('user.register'), 'Register');
}


/**
 * Resources
 */
Route::resource('groups', 'GroupController');
Route::resource('campaigns', 'CampaignsController');
Route::resource('jobs', 'JobsController');
Route::resource('admin.products', 'Admin\ProductsController');
Route::resource('feeds', 'FeedsController');