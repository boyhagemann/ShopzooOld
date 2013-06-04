<?php

class AdviceUser extends Eloquent {
    protected $guarded = array();
    public static $rules = array();

	protected $table = 'advice_user';

	public function advice()
	{
		return $this->belongsTo('Advice');
	}
	public function user()
	{
		return $this->belongsTo('User');
	}

}