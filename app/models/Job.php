<?php

class Job extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

	/**
	 * @param string	$url
	 * @param string	$method
	 * @param array 	$params
	 * @return mixed
	 */
	public static function add($url, $method, Array $params = array())
	{
		return Job::create(array(
			'url' 		=> $url,
			'method' 	=> $method,
			'params' 	=> serialize($params),
		))->save();
	}
}