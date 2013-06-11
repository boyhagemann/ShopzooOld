<?php

class Action extends Eloquent
{
    const ACTION_PRODUCT_SALE   = 'product sale';
    const ACTION_PRODUCT_CLICK  = 'product click';
    const ACTION_FRIEND_INVITE  = 'invite friend';
    const ACTION_FRIEND_ACCEPT  = 'accepted invitation';
    
    const EMOTION_HAPPY         = 'happy';
    const EMOTION_SERIOUS       = 'serious';
    
    const TIMEFRAME_INSTANT     = 'instant';
    const TIMEFRAME_QUICK       = 'quick';
    const TIMEFRAME_MODERATE    = 'moderate';
    const TIMEFRAME_SLOW        = 'slow';
    
    protected $guarded = array();
    
    public static $rules = array(
        'action'        => 'required',
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
    
    /**
     * 
     * @param string $action
     * @param string $emotion
     * @param string $timeframe
     * @return Action
     */
    static public function fromSnippet($action, $emotion = Action::EMOTION_HAPPY, $timeframe = Action::TIMEFRAME_MODERATE)
    {
        $snippet = Snippet::random($action, $emotion, $timeframe);
        $message = $snippet->message;
        
        return new static(compact('action', 'emotion', 'message'));
    }
}