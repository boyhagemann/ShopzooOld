<?php

class FeedsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('feeds')->delete();

        // Uncomment the below to run the seeder
         DB::table('feeds')->insert(array(
			'campaign_id' => 1,
			'url' => URL::route('import.tradetracker.feed', 2626)
		 ));
    }

}