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
Route::model('advices', 'Advice');
Route::model('link', 'Link');
Route::model('user', 'User');



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
Route::get('import/tradetracker', array(
	'uses' 	=> 'Import\TradeTrackerController@index',
	'as' 	=> 'import.tradetracker',
));
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
 * Images
 */
Route::get('image/resize/{path}/{width}/{height}', array(
	'uses' 	=> 'ImagesController@resize',
	'as'	=> 'image.resize'
))->where('path', '(.*)');


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
	Route::get('advices/create/{link?}', array(
		'uses' => 'AdvicesController@create',
		'as' => 'advices.create',
	));
	Route::resource('advices', 'AdvicesController', array('except' => array('create')));
	Route::post('advices/add-link/{link}', array(
		'uses' => 'AdvicesController@addLink',
		'as' => 'advices.link.add',
	));
	Route::get('advices/remove-link/{link}', array(
		'uses' => 'AdvicesController@removeLink',
		'as' => 'advices.link.remove',
	));
	Route::get('advices/add-recipient/{advices}', array(
		'uses' => 'AdvicesController@addRecipient',
		'as' => 'advices.recipient.add',
	));
	Route::post('advices/add-recipient/{advices}', array(
		'uses' => 'AdvicesController@storeRecipient',
		'as' => 'advices.recipient.store',
	));
	Route::get('advices/remove-recipient/{user}', array(
		'uses' => 'AdvicesController@removeRecipient',
		'as' => 'advices.recipient.remove',
	));
	Route::get('advices/{advices}/send', array(
		'uses' => 'AdvicesController@send',
		'as' => 'advices.send',
	));

});


/**
 * Menu
 */
$menu = Menu::handler('main', array('class' => 'nav'));
$menu->add('', '<i class="icon-home"></i> Homepage');
$menu->add('products', '<i class="icon-globe"></i> Products');

if(Sentry::check()) {

	$menu->add('transactions', '<i class="icon-shopping-cart"></i> Transactions');
	$menu->add('advices', '<i class="icon-envelope"></i> Advices');

	$menuUser = Menu::handler('user', array('class' => 'nav pull-right'));
	$menuUser->add(URL::route('user.logout'), '<i class="icon-unlock"></i> Log out');
}
else {

	$menuUser = Menu::handler('user', array('class' => 'nav pull-right'));
	$menuUser->add(URL::route('user.login'), '<i class="icon-lock"></i> Login');
	$menuUser->add(URL::route('user.register'), '<i class="icon-user"></i> Register');
}


/**
 * Resources
 */
Route::resource('groups', 'GroupController');
Route::resource('campaigns', 'CampaignsController');
Route::resource('jobs', 'JobsController');
Route::resource('admin.products', 'Admin\ProductsController');
Route::resource('feeds', 'FeedsController');

Route::resource('questions', 'QuestionsController');