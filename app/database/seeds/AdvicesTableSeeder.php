<?php

class AdvicesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('advices')->delete();

        // Uncomment the below to run the seeder
         DB::table('advices')->insert(array(
			 'from' => 1,
			 'subject' => 'An advice draft',
			 'body' => 'Some advice body',
		 ));
    }

}