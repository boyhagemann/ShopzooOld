<?php

class ProductsTableSeeder extends Seeder {

    public function run()
    {
    	 DB::table('products')->delete();
         DB::table('products')->insert(array(
			 'id' 			=> 1,
			 'foreign_id' 	=>  13796,
			 'campaign_id' 	=> 2626,
			 'title' 		=> 'Simplehuman Afvalzakken 50-60 L Code P',
			 'image' 		=> 'http://media.fonq.nl/fonq/normaal/60111/simplehuman-afvalzakken-50-60-l-code-p.jpg',
			 'url' 			=> 'http://tc.tradetracker.net/?c=2626&m=251443&a=48216&u=http%3A%2F%2Fwww.afvalemmershop.nl%2Fproduct%2Fsimplehuman-afvalzakken-50-60-l-code-p%2F13796%2F%3Fosadcampaign%3Dtradetracker%26utm_source%3Dtt%26utm_medium%3Dcps%26utm_content%3Dfeedbeheer%26utm_camp',
			 'price' 		=> '8,50',
		 ));
    }

}