<?php

class Action extends Eloquent
{
    const ACTION_PRODUCT_SALE   = 'product sale';
    const ACTION_PRODUCT_CLICK  = 'product click';
    const ACTION_FRIEND_INVITE  = 'invite friend';
    const ACTION_FRIEND_ACCEPT  = 'accepted invitation';
    
    const EMOTION_HAPPY         = 'happy';
    const EMOTION_SERIOUS       = 'serious';
    
    protected $guarded = array();
    
    public static $rules = array(
        'type'          => 'required',
        'message'       => 'required',
        'user_id'       => 'required|integer',
        'product_id'    => 'integer',
        'friend_id'     => 'integer',
    );

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function friend()
    {
        return $this->belongsTo('User', 'friend_id');
    }
}