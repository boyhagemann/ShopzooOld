<?php

class Question extends Eloquent {
    protected $fillable = array(
        'subject',
        'body',
        'user_id',
    );

    public static $rules = array(
        'subject' => 'required',
        'body' => 'required',
    );

    public function user()
    {
        return $this->belongsTo('User');
    }
}