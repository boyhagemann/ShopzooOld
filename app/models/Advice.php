<?php

class Advice extends Eloquent {
    protected $guarded = array();
    public static $rules = array();

	public function from()
	{
		return $this->belongsTo('User');
	}

	public function to()
	{
		return $this->hasMany('User');
	}

	public function links()
	{
		return $this->belongsToMany('Link');
	}
}