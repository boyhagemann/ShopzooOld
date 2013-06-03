<?php

class LinksTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('links')->delete();

        // Uncomment the below to run the seeder
         DB::table('links')->insert(array(
			 'user_id' => 1,
			 'product_id' => 1,
			 'code' => 'hrew6' // has a TradeTracker click transaction, handy for testing
		 ));
    }

}