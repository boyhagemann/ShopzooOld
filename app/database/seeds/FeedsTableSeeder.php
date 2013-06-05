<?php

class FeedsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('feeds')->delete();

		// Afvalemmershop.nl
         DB::table('feeds')->insert(array(
			'campaign_id' => 1,
			'url' => URL::route('import.tradetracker.feed', 2626)
		 ));

		// Algebeld.nl
		DB::table('feeds')->insert(array(
			'campaign_id' => 2,
			'url' => URL::route('import.tradetracker.feed', 1078)
		));

		// Bestelkado.nl
         DB::table('feeds')->insert(array(
			'campaign_id' => 3,
			'url' => URL::route('import.tradetracker.feed', 867)
		 ));
    }

}