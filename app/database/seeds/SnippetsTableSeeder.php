<?php

class SnippetsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('snippets')->delete();

        /**
         * Friend invite
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_FRIEND_INVITE,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'You invited your friend, how cute',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_FRIEND_INVITE,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'You finally invited your friend. Couldn\'t do it earlier, could you?',
        ));
        
        /**
         * Friend accept
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_FRIEND_ACCEPT,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'You and your friend are best buddies: he accepted your invitation!',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_FRIEND_ACCEPT,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'Your mate accepted your invitation! Can you two make serious money?',
        ));
        
        /**
         * Product click
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_PRODUCT_CLICK,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'Yihaa, your friend clicked on the link you send. Could this lead to some sale?',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_PRODUCT_CLICK,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'Yihaa, your friend clicked on the link you send. Could this lead to some sale?',
        ));
        
        /**
         * Product sale
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_PRODUCT_SALE,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'Woohoo! Your friend bought the product. I can\'t be more excited for you!',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Action::ACTION_PRODUCT_SALE,
            'emotion'   => Action::EMOTION_HAPPY,
            'timeframe' => Action::TIMEFRAME_MODERATE,
            'message'   => 'Congrats dear user! We have a sale! Your friend bought the product and he loves it',
        ));
    }

}