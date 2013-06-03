<?php

class Transaction extends Eloquent {
    protected $guarded = array();
    public static $rules = array();

	public function link()
	{
		return $this->belongsTo('Link');
	}

	public function campaign()
	{
		return $this->belongsTo('Campaign');
	}
}