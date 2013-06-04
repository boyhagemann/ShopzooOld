<?php

class Advice extends Eloquent {
    protected $guarded = array();
    public static $rules = array(
		'subject' 	=> 'required',
		'body' 		=> 'required',
	);

	public function from()
	{
		return $this->belongsTo('User');
	}

	public function to()
	{
		return $this->belongsToMany('User');
	}

	public function links()
	{
		return $this->belongsToMany('Link');
	}
}