<?php

class Basket extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function friend()
	{
		return $this->belongsTo('User', 'friend_id');
	}

	public function product()
	{
		return $this->belongsTo('Product');
	}
}