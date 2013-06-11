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
    static public function random($action, $emotion = Action::EMOTION_HAPPY, $timeframe = Action::TIMEFRAME_MODERATE)
    {
        return static::whereAction($action)
                       ->whereEmotion($emotion)
                       ->whereTimeframe($timeframe)
                       ->orderBy(DB::raw('RAND()'))
                       ->first();
    }
}