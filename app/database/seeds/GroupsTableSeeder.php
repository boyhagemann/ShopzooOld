<?php

class GroupsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('groups')->delete();

        DB::table('groups')->insert(array(
            'id' => 1,
            'name' => 'Member',
			'permissions' => '',
        ));

    }

}