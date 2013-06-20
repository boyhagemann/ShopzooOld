<?php

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            'id' => 1,
            'email' => 'boy@swis.nl',
            'first_name' => 'Boy',
            'last_name' => 'Swis',
            'gender' => 'm',
            'password' => Hash::make('testtest'),
            'activated' => true,
        ));

        DB::table('users')->insert(array(
            'id' => 2,
            'email' => 'boyhagemann@gmail.com',
            'first_name' => 'Boy',
            'last_name' => 'Hagemann',
            'gender' => 'm',
            'password' => Hash::make('testtest'),
            'activated' => true,
            'parent_user_id' => 1
        ));

        DB::table('users')->insert(array(
			'id' => 3,
            'email' => 'test1@test.com',
            'first_name' => 'Test1',
            'last_name' => 'Lastname',
            'gender' => 'm',
            'password' => Hash::make('testtest'),
            'activated' => true,
            'parent_user_id' => 2
        ));

        DB::table('users')->insert(array(
            'email' => 'test2@test.com',
            'first_name' => 'Test2',
            'last_name' => 'Lastname',
            'gender' => 'm',
            'password' => Hash::make('testtest'),
            'activated' => true,
            'parent_user_id' => 2
        ));

        DB::table('users')->insert(array(
            'email' => 'test3@test.com',
            'first_name' => 'Test3',
            'last_name' => 'Lastname',
            'gender' => 'f',
            'password' => Hash::make('testtest'),
            'activated' => true,
            'parent_user_id' => 2
        ));
    }

}