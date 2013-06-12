<?php

class Snippet extends Eloquent
{
    protected $guarded = array();
    
    public static $rules = array(
        'action'    => 'required|string',
        'message'   => 'required|string',
        'timeframe' => 'required|string',
        'message'   => 'required|string',
    );
    
    /**
     * 
     * @param string $action
     * @param string $emotion
     * @param string $timeframe
     * @return Snippet
     */
    static public function random($action, $emotion, $timeframe, User $user = null, User $friend = null)
    {
        $q = static::whereAction($action)
                       ->whereEmotion($emotion)
                       ->whereTimeframe($timeframe)
                       ->orderBy(DB::raw('RAND()'));
        
        if($friend && $friend->gender) {
            $q->whereFriendGenderAware(true);
        }
        
        return $q->first();
    }
    
    /**
     * 
     * @param Stream $stream
     * @return Snippet
     */
    static public function fromStream(Stream $stream)
    {
        $action = $stream->action;
        $emotion = $stream->emotion ?: Stream::EMOTION_HAPPY;
        $timeframe = $stream->timeframe ?: Stream::TIMEFRAME_MODERATE;
        
        return static::random($action, $emotion, $timeframe, $stream->user, $stream->friend);
    }

}