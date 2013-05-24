<?php

class FeedsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

	public function import($campaignId)
	{
		$client = new \Zend\Soap\Client('http://ws.tradetracker.com/soap/affiliate?wsdl');
		$client->authenticate(Config::get('services.tradetracker_id'), Config::get('services.tradetracker_key'));

		$products = $client->getFeedProducts(48216, array(
			'campaignID' => $campaignId,
			'limit' => 3,
		));

		foreach($products as $product) {

			Job::add(URL::route('products.import'), 'POST', array(
				'product' 		=> $product,
				'campaign_id' 	=> $campaignId,
			));

		}
	}

}