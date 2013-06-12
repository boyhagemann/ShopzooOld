<?php

class StreamsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('streams')->delete();
        
        $stream = new Stream();
        $stream->action = Stream::ACTION_FRIEND_INVITE;
        $stream->user_id = 1;
        $stream->friend_id = 2;
        $stream->buildMessage();
        $stream->save();
        
        $stream = new Stream();
        $stream->action = Stream::ACTION_USER_INVITE;
        $stream->user_id = 2;
        $stream->friend_id = 1;
        $stream->buildMessage();
        $stream->save();
                         
        $stream = new Stream();
        $stream->action = Stream::ACTION_USER_ACCEPT;
        $stream->user_id = 2;
        $stream->friend_id = 1;
        $stream->buildMessage();
        $stream->save();   
        
        $stream = new Stream();
        $stream->action = Stream::ACTION_FRIEND_ACCEPT;
        $stream->user_id = 1;
        $stream->friend_id = 2;
        $stream->buildMessage();
        $stream->save();
        
        $stream = new Stream();
        $stream->action = Stream::ACTION_PRODUCT_CLICK;
        $stream->user_id = 1;
        $stream->friend_id = 2;
        $stream->buildMessage();
        $stream->save();
        
        $stream = new Stream();
        $stream->action = Stream::ACTION_PRODUCT_SALE;
        $stream->user_id = 1;
        $stream->friend_id = 2;
        $stream->buildMessage();
        $stream->save();
        
        $stream = new Stream();
        $stream->action = Stream::ACTION_PRODUCT_SALE;
        $stream->user_id = 1;
        $stream->friend_id = 2;
        $stream->buildMessage();
        $stream->save();
    }

}