<?php

use Cartalyst\Sentry\Users\Eloquent\User;

class Link extends Eloquent {

    protected $guarded = array();

    public static $rules = array(
		'product_id' 	=> 'required|integer',
		'user_id' 		=> 'required|integer',
	);

	public function product()
	{
		return $this->belongsTo('Product');
	}

	public function user()
	{
		return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User');
	}

	/**
	 * @param Product $product
	 * @param User    $user
	 * @return string
	 */
	static public function findOrCreate(Product $product, User $user)
	{
		$link = static::whereProductId($product->id)->whereUserId($user->id)->first();
		if($link) {
			return $link;
		}

		return static::shorten($product, $user);
	}

	/**
	 * @param Product $product
	 * @param User    $user
	 * @return string
	 */
	static public function shorten(Product $product, User $user)
	{
		$code = base_convert(rand(0, 999999), 20, 36);
		if(static::whereCode($code)->first()) {
			return static::shorten($product, $user);
		}

		return static::create(array(
			'user_id' 		=> $user->id,
			'product_id' 	=> $product->id,
			'code' 			=> $code,
		));
	}
}