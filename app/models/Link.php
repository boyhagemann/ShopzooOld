<?php

use Cartalyst\Sentry\Users\Eloquent\User;

class Link extends Eloquent {

    protected $guarded = array();

    public static $rules = array(
		'url' => 'required|url',
		'user_id' => 'required|integer',
	);

	/**
	 * @param Product $product
	 * @param User    $user
	 * @return string
	 */
	static public function shorten(Product $product, User $user)
	{
		$code = base_convert(rand(0, 999999), 20, 36);
		if(Link::whereCode($code)->first()) {
			return self::shorten($product, $user);
		}

		var_dump($product->url); exit;

		Link::create(array(
			'user_id' => $user->id,
			'url' => $product->url,
			'code' => $code,
		));

		return $code;
	}
}