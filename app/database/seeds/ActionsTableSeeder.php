<?php

class ActionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('actions')->delete();

        DB::table('actions')->insert(array(
            'action' => Action::ACTION_FRIEND_INVITE,
            'emotion' => Action::EMOTION_HAPPY,
            'message' => 'You invited your friend',
            'user_id' => 1,
            'friend_id' => 2,
        ));
        
        DB::table('actions')->insert(array(
            'action' => Action::ACTION_FRIEND_ACCEPT,
            'emotion' => Action::EMOTION_HAPPY,
            'message' => 'Your friend accepted the invitation!',
            'user_id' => 1,
            'friend_id' => 2,
        ));
        
        DB::table('actions')->insert(array(
            'action' => Action::ACTION_PRODUCT_CLICK,
            'emotion' => Action::EMOTION_HAPPY,
            'message' => 'This is a log message',
            'user_id' => 1,
            'friend_id' => 2,
            'product_id' => 1,
        ));
        
        DB::table('actions')->insert(array(
            'action' => Action::ACTION_PRODUCT_SALE,
            'emotion' => Action::EMOTION_HAPPY,
            'message' => 'Yes! There was a sale for your link',
            'user_id' => 1,
            'friend_id' => 2,
            'product_id' => 1,
        ));
    }

}