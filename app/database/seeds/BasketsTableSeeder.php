<?php

class BasketsTableSeeder extends Seeder {

    public function run()
    {
    	 DB::table('baskets')->delete();
         DB::table('baskets')->insert(array(
			 'user_id' => 2,
			 'friend_id' => 1,
			 'product_id' => 1,
		 ));
    }

}