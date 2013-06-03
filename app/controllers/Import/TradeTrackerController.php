<?php

namespace Import;

use Config,
    URL,
    Job,
    Input,
    Product,
	Campaign,
	Transaction,
	Link;

class TradeTrackerController extends \BaseController
{

    public function feed($campaignId)
    {
        $client = new \Zend\Soap\Client('http://ws.tradetracker.com/soap/affiliate?wsdl');
        $client->authenticate(Config::get('services.tradetracker_id'), Config::get('services.tradetracker_key'));

        $products = $client->getFeedProducts(48216, array(
            'campaignID' => $campaignId,
            'limit' => 50,
        ));

        foreach ($products as $product) {

            Job::add(URL::route('import.tradetracker.product'), 'POST', array(
                'product' => $product,
                'campaign_id' => $campaignId,
            ));
        }
    }

    public function product()
    {
        $data       = Input::get('product');
        $campaignId = Input::get('campaign_id');
        $additional = array();

        if (isset($data->additional)) {
            foreach ($data->additional as $info) {
                $additional[$info->name] = $info->value;
            }
        }

        $product = Product::where('foreign_id', '=', $data->identifier)
                ->where('campaign_id', '=', $campaignId)
                ->first();

        if (!$product) {
            $product = new Product();
        }

        $product->campaign_id   = $campaignId;
        $product->foreign_id    = $data->identifier;
        $product->title         = $data->name;
        $product->price         = $data->price;
        $product->image         = $data->imageURL;
        $product->description   = $data->description;
        $product->url           = $data->productURL;

        $product->save();
    }

	public function conversions()
	{
		$client = new \Zend\Soap\Client('http://ws.tradetracker.com/soap/affiliate?wsdl');
		$client->authenticate(Config::get('services.tradetracker_id'), Config::get('services.tradetracker_key'));

		$transactions = $client->getClickTransactions(48216);

		foreach($transactions as $data) {

			$link = Link::whereCode($data->reference)->first();
			if(!$link) {
				continue;
			}

			Transaction::create(array(
				'foreign_id' 	=> $data->ID,
				'link_id' 		=> $link->id,
				'commission' 	=> $data->commission,
			));

		}

		var_dump($transactions); exit;
	}

}