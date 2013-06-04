<?php

class AdviceLink extends Eloquent {
    protected $guarded = array();
    public static $rules = array();

	public function advice()
	{
		return $this->belongsTo('Advice');
	}
	public function link()
	{
		return $this->belongsTo('Link');
	}

}