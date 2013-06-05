<?php

class JobsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('jobs')->delete();

		// Afvalemmershop.nl
         DB::table('jobs')->insert(array(
			'url' => URL::route('import.tradetracker.feed', 2626),
			'method' => 'GET',
			'params' => serialize(array()),
		 ));

		// Algebeld.nl
         DB::table('jobs')->insert(array(
			'url' => URL::route('import.tradetracker.feed', 1078),
			'method' => 'GET',
			'params' => serialize(array()),
		 ));

		// Bestelkado.nl
         DB::table('jobs')->insert(array(
			'url' => URL::route('import.tradetracker.feed', 867),
			'method' => 'GET',
			'params' => serialize(array()),
		 ));
    }

}