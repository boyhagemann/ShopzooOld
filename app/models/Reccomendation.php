<?php

class Reccomendation extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

	public function products()
	{
		return $this->belongsToMany('Product');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function friend()
	{
		return $this->belongsTo('User', 'friend_id');
	}

	/**
	 * @param Product $product
	 * @return bool
	 */
	public function hasProduct(Product $product)
	{
		foreach($this->products as $registeredProduct) {
			if($registeredProduct->id == $product->id) {
				return true;
			}
		}
		return false;
	}

}