<?php

class ActionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('actions')->delete();

        $action = Action::fromSnippet(Action::ACTION_FRIEND_INVITE);
        $action->user_id = 1;
        $action->friend_id = 2;
        $action->save();
        
        $action = Action::fromSnippet(Action::ACTION_FRIEND_INVITE);
        $action->user_id = 1;
        $action->friend_id = 2;
        $action->save();
        
        $action = Action::fromSnippet(Action::ACTION_PRODUCT_CLICK);
        $action->user_id = 1;
        $action->friend_id = 2;
        $action->product_id = 1;
        $action->save();
        
        $action = Action::fromSnippet(Action::ACTION_FRIEND_INVITE);
        $action->user_id = 1;
        $action->friend_id = 2;
        $action->product_id = 1;
        $action->save();
        
    }

}