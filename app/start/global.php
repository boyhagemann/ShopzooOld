<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a rotating log file setup which creates a new file each day.
|
*/

$logFile = 'log-'.php_sapi_name().'.txt';

Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenace mode is in effect for this application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';



Form::macro('twText', function ($label, $name, $default = null, $attributes = array()) {

	$mask = '<div class="control-group">
        <div class="controls">
                %s
                %s
            </div>
    </div>
    ';

	$label = Form::label($label, $name);
	$input = Form::text($name, $default, $attributes);
	$html  = sprintf($mask, $label, $input);

	return $html;
});

Form::macro('twTextArea', function ($label, $name, $default = null, $attributes = array()) {

	$mask = '<div class="control-group">
        <div class="controls">
                %s
                %s
            </div>
    </div>
    ';

	$label = Form::label($label, $name);
	$input = Form::textarea($name, $default, $attributes);
	$html  = sprintf($mask, $label, $input);

	return $html;
});


Form::macro('twPassword', function ($label, $name, $attributes = array()) {

	$mask = '<div class="control-group">
        <div class="controls">
                %s
                %s
            </div>
    </div>
    ';

	$label = Form::label($label, $name);
	$input = Form::password($name, $attributes);
	$html  = sprintf($mask, $label, $input);

	return $html;
});

Form::macro('twBtnGroup', function ($elements) {

	$mask = '
    <div class="btn-group">
        %s
    </div>
    ';

	$input = implode(PHP_EOL, (array)$elements);

	$html = sprintf($mask, $input);

	return $html;
});


Form::macro('modelSelect', function ($name, $model, $defaults = null, Array $options = array()) {
	$data = Form::multiOptionsFromModel($model, $options, $defaults);
	return Form::select($name, $data['multiOptions'], $data['defaults']);
});

Form::macro('modelCheckbox', function ($name, $model, $defaults = array(), Array $options = array()) {
	$data = Form::multiOptionsFromModel($model, $options, $defaults);
	return Form::multiCheckbox($name, $data['multiOptions'], $data['defaults']);
});

Form::macro('modelRadio', function ($name, $model, Array $defaults = null, Array $options = array()) {
	$data = Form::multiOptionsFromModel($model, $options, $defaults);
	return Form::multiRadio($name, $data['multiOptions'], $data['defaults']);
});

Form::macro('multiCheckbox', function ($name, $multiOptions, Array $defaults = null) {

	$name .= '[]';
	$inputs = array();

	foreach ($multiOptions as $key => $value) {

		$default = is_array($defaults) && in_array($key, $defaults) ? $key : null;

		$inputName = sprintf('%s[%s]', $name, $key);
		$inputs[]  =
			Form::checkbox($name, $key, $default, array(
				'id' => $inputName,
			)) .
			Form::label($inputName, $value);
	}

	return implode('<br>', $inputs);
});

Form::macro('multiRadio', function ($name, $multiOptions, Array $defaults = null) {

	$inputs = array();

	foreach ($multiOptions as $key => $value) {
		$inputName = sprintf('%s_%s', $name, $key);
		$inputs[]  =
			Form::radio($name, $key, null, array(
				'id' => $inputName,
			)) .
			Form::label($inputName, $value);
	}

	return implode('<br>', $inputs);
});

Form::macro('multiOptionsFromModel', function ($model, Array $options = array(), $defaults = null) {

	if (is_string($model)) {
		$q = App::make($model)
			->newQuery();
	}

	if (!isset($options['keyField'])) {
		$options['keyField'] = 'id';
	}

	if (!isset($options['valueField'])) {
		$options['valueField'] = 'title';
	}

	// Allow for altering the select query by passing a closure in the
	// options array
	if (isset($q) && isset($options['query']) && is_callable($options['query'])) {
		call_user_func($options['query'], $q);
	}

	$multiOptions = array();
	$defaults = array();

	if (isset($options['emptyValue'])) {
		$multiOptions[''] = $options['emptyValue'];
	}

	if ($model instanceof \Illuminate\Database\Eloquent\Collection) {
		$collection = $model;
	}
	else {
		$collection = $q->get();
	}

	foreach ($collection as $record) {

		if (is_callable($options['keyField'])) {
			$key = call_user_func($options['keyField'], $record);
		} else {
			$key = $record->{$options['keyField']};
		}

		if (is_callable($options['valueField'])) {
			$value = call_user_func($options['valueField'], $record);
		} else {
			$value = $record->{$options['valueField']};
		}

		$multiOptions[$key] = $value;

		if($defaults && is_callable($defaults)) {
			$options['checked'] = $defaults;
		}

		if(isset($options['checked']) && is_callable($options['checked'])) {
			if(call_user_func($options['checked'], $record)) {
				$defaults[] = $key;
			}
		}
	}

	return compact('multiOptions', 'defaults');
});

