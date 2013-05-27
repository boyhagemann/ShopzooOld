<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('users')->delete();

        // Uncomment the below to run the seeder
         DB::table('users')->insert(array(
			'email' => 'boyhagemann@gmail.com',
			'password' => Hash::make('testtest'),
			'activated' => true,
		 ));
    }

}