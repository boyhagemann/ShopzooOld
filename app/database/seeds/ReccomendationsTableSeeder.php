<?php

class ReccomendationsTableSeeder extends Seeder {

    public function run()
    {
		DB::table('reccomendations')->delete();

		$reccomendation = Reccomendation::create(array(
			'user_id' => 2,
			'friend_id' => 1,
			'status' => 'draft',
		));
		$reccomendation->products()->attach(1);
		$reccomendation->save();

		$reccomendation = Reccomendation::create(array(
			'user_id' => 2,
			'friend_id' => 3,
			'status' => 'sent',
		));
		$reccomendation->products()->attach(1);
		$reccomendation->save();
    }

}