<?php

class CampaignsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('campaigns')->delete();

        $campaigns = array(
			'name' => 'Afvalemmershop.nl',
			'affiliate' => 'TradeTracker',
        );

        // Uncomment the below to run the seeder
         DB::table('campaigns')->insert($campaigns);
    }

}