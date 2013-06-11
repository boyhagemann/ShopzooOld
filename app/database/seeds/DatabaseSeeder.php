<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CampaignsTableSeeder');
		$this->call('JobsTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('FeedsTableSeeder');
		$this->call('LinksTableSeeder');
		$this->call('SnippetsTableSeeder');
		$this->call('ActionsTableSeeder');
	}

}