<?php

namespace Token;
use  Illuminate\Database\Eloquent;

class Tokenizer
{
	protected $models;

	/**
	 * @param string   $name
	 * @param Eloquent $model
	 */
	public function setModel($name, Eloquent $model)
	{
		$this->models[$name] = $model;
	}

	/**
	 * @param string $name
	 * @return Eloquent
	 */
	public function getModel($name)
	{
		return $this->models[$name];
	}

	/**
	 * @param string $string
	 * @return string
	 */
	public function tokenize($string)
	{
		return $tokenized;
	}

	public function tokenizePattern($string, $pattern)
	{
		preg_match_all($pattern, $string, $matches);

		var_dump($matches); exit;
	}
}