<?php

class JobsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('jobs')->delete();

        // Uncomment the below to run the seeder
         DB::table('jobs')->insert(array(
			'url' => URL::route('feeds.import', 2626),  // Afvalemmershop.nl
			'method' => 'GET',
			'params' => serialize(array()),
		 ));
    }

}