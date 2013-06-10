<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	 DB::table('users')->delete();

         DB::table('users')->insert(array(
			'id' => 1,
			'email' => 'boyhagemann@gmail.com',
			'password' => Hash::make('testtest'),
			'activated' => true,
		 ));

		DB::table('users')->insert(array(
			'id' => 2,
			'email' => 'boy@swis.nl',
			'password' => Hash::make('testtest'),
			'activated' => true,
			'parent_user_id' => 1
		));
    }

}