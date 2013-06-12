<?php

class SnippetsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('snippets')->delete();

        /**
         * Friend invite
         */
        
        DB::table('snippets')->insert(array(
            'action'                => Stream::ACTION_FRIEND_INVITE,
            'emotion'               => Stream::EMOTION_HAPPY,
            'timeframe'             => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 0,
            'message'               => 'You invited your friend, how cute',
        ));
        DB::table('snippets')->insert(array(
            'action'                => Stream::ACTION_FRIEND_INVITE,
            'emotion'               => Stream::EMOTION_HAPPY,
            'timeframe'             => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'               => 'You invited your friend, nice! How is {friend.he-she} doing?',
        ));
        
        DB::table('snippets')->insert(array(
            'action'        => Stream::ACTION_FRIEND_INVITE,
            'emotion'       => Stream::EMOTION_HAPPY,
            'timeframe'     => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'  => 0,
            'message'       => 'You finally invited your friend. {friend.He-She} was calling me the other day asking me for an invitation. What do you think of that?',
        ));
        DB::table('snippets')->insert(array(
            'action'        => Stream::ACTION_FRIEND_INVITE,
            'emotion'       => Stream::EMOTION_HAPPY,
            'timeframe'     => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'  => 1,
            'message'       => 'You finally invited your friend. Couldn\'t do it earlier, could you?',
        ));
        
        /**
         * User invite
         */
        
        DB::table('snippets')->insert(array(
            'action'                => Stream::ACTION_USER_INVITE,
            'emotion'               => Stream::EMOTION_HAPPY,
            'timeframe'             => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 0,
            'message'               => 'Finally, you were invited as a friend. Can you believe it took that long?',
        ));
        DB::table('snippets')->insert(array(
            'action'                => Stream::ACTION_USER_INVITE,
            'emotion'               => Stream::EMOTION_HAPPY,
            'timeframe'             => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'               => 'Finally, {friend.name} invited you as a friend. Can you believe it took {friend.him-her} that long?',
        ));
        
        /**
         * Friend accept
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_FRIEND_ACCEPT,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 0,
            'message'   => 'You and your friend are best buddies: he accepted your invitation!',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_FRIEND_ACCEPT,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Your mate accepted your invitation! Let {friend.him-her} know you are gratefull by buying a cool product if {friend.him-her}?',
        ));
        
        /**
         * User accept
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_USER_ACCEPT,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'You accepted the invitation of {friend.name} and got yourself in to the business. Welcome aboard!',
        ));
        
        /**
         * Product click
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_CLICK,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Yihaa, your friend clicked on the link you send. Could this lead to some sale?',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_CLICK,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Yihaa, your friend clicked on the link you send. Could this lead to some sale?',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_CLICK,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Your friend loves your product. Is he really going to buy it, you think?',
        ));
        
        /**
         * Product sale
         */
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_SALE,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Woohoo! Your friend bought the product. I can\'t be more excited for you!',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_SALE,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Congrats dear user! We have a sale! Your friend bought the product and he loves it',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_SALE,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Were making money! Your friend bought a brand new product and wants to thank you.',
        ));
        
        DB::table('snippets')->insert(array(
            'action'    => Stream::ACTION_PRODUCT_SALE,
            'emotion'   => Stream::EMOTION_HAPPY,
            'timeframe' => Stream::TIMEFRAME_MODERATE,
            'friend_gender_aware'   => 1,
            'message'   => 'Diddly Doo! You are getting richer every second! A new sale has been registered from your friend.',
        ));
    }

}