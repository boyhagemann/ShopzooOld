<?php namespace Boyhagemann\Modelform;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Form;

class ModelformServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('boyhagemann/modelform');


		Form::macro('modelSelect', function($name, $model, Array $options = array()) {
			return Form::select($name, Form::multiOptionsFromModel($model, $options));
		});

		Form::macro('modelCheckbox', function($name, $model, Array $options = array()) {
			return Form::multiCheckbox($name, Form::multiOptionsFromModel($model, $options));
		});

		Form::macro('modelRadio', function($name, $model, Array $options = array()) {
			return Form::multiRadio($name, Form::multiOptionsFromModel($model, $options));
		});

		Form::macro('multiCheckbox', function($name, $multiOptions) {

			$name .= '[]';
			$inputs = array();

			foreach($multiOptions as $key => $value) {
				$inputName = sprintf('%s[%s]', $name, $key);
				$inputs[] =
					Form::checkbox($name, $key, null, array(
						'id' => $inputName,
					)) .
					Form::label($inputName, $value);
			}
			return implode('<br>', $inputs);
		});

		Form::macro('multiRadio', function($name, $multiOptions) {

			$inputs = array();

			foreach($multiOptions as $key => $value) {
				$inputName = sprintf('%s_%s', $name, $key);
				$inputs[] =
					Form::radio($name, $key, null, array(
						'id' => $inputName,
					)) .
					Form::label($inputName, $value);
			}
			return implode('<br>', $inputs);
		});

		Form::macro('multiOptionsFromModel', function($model, Array $options = array()) {

			if (is_string($model)) {
				$q = App::make($model)->newQuery();
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
				}
				else {
					$key = $record->{$options['keyField']};
				}

				if (is_callable($options['valueField'])) {
					$value = call_user_func($options['valueField'], $record);
				}
				else {
					$value = $record->{$options['valueField']};
				}

				$multiOptions[$key] = $value;
			}

			return $multiOptions;
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}