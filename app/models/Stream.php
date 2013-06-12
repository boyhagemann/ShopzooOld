<?php

class Stream extends Eloquent
{
    const ACTION_PRODUCT_SALE   = 'product sale';
    const ACTION_PRODUCT_CLICK  = 'product click';
    const ACTION_FRIEND_INVITE  = 'invite friend';
    const ACTION_FRIEND_ACCEPT  = 'friend accepted invitation';
    const ACTION_USER_INVITE    = 'user invited';
    const ACTION_USER_ACCEPT    = 'user accepted invitation';
    
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
    
    protected $tokens = array(
        '{user.name}',
        '{friend.name}',
        '{friend.he-she}',
        '{friend.He-She}',
        '{friend.his-her}',
        '{friend.him-her}',
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
    
    
    public function buildMessage()
    {
        $this->message = Snippet::fromStream($this)->message;
    }

    
    /**
     * 
     * @param Stream $stream
     */
    public function tokenize()
    {
        $user   = $this->user;
        $friend = $this->friend;
                
        foreach($this->tokens as $token) {
            
            $replace = '';
            
            switch($token) {
                
                case '{user.name}':
                    if($user) {
                        $replace = sprintf('<a href="%s" class="user">%s</a>', URL::route('user.show', $user->id), $user->name());
                    }
                    break;
                    
                case '{friend.name}':
                    if($friend) {
                        $replace = sprintf('<a href="%s" class="friend">%s</a>', URL::route('user.show', $friend->id), $friend->name());
                    }
                    break;

                case '{friend.he-she}':
                    if($friend && $friend->gender) {
                        $replace = $friend->gender == 'm' ? 'he' : 'she';
                    }
                    break;
                    
                case '{friend.He-She}':
                    if($friend && $friend->gender) {
                        $replace = $friend->gender == 'm' ? 'He' : 'She';
                    }
                    break;

                case '{friend.his-her}':
                    if($friend && $friend->gender) {
                        $replace = $friend->gender == 'm' ? 'his' : 'her';
                    }
                    break;
                    
                case '{friend.him-her}':
                    if($friend && $friend->gender) {
                        $replace = $friend->gender == 'm' ? 'him' : 'her';
                    }
                    break;
                    
            }
            
            $this->message = str_replace($token, $replace, $this->message);            
        }        
        
    }
}