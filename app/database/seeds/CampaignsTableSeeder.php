<?php

class CampaignsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('campaigns')->delete();

         DB::table('campaigns')->insert(array(
			 'id' => 1,
			 'name' => 'Afvalemmershop.nl',
			 'affiliate' => 'TradeTracker',
		 ));

         DB::table('campaigns')->insert(array(
			 'id' => 2,
			 'name' => 'Algebeld.nl',
			 'affiliate' => 'TradeTracker',
		 ));

         DB::table('campaigns')->insert(array(
			 'id' => 3,
			 'name' => 'Bestelkado.nl',
			 'affiliate' => 'TradeTracker',
		 ));
    }

}