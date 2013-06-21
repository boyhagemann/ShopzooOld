<?php

class ReccomendationsController extends BaseController {

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
     * @param  Reccomendation $reccomendation
     * @return Response
     */
    public function show(Reccomendation $reccomendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Reccomendation $reccomendation
     * @return Response
     */
    public function edit(Reccomendation $reccomendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Reccomendation $reccomendation
     * @return Response
     */
    public function update(Reccomendation $reccomendation)
    {
        //
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function addProduct( )
	{
		$user 				= Sentry::getUser();
		$product 			= Product::find(Input::get('product_id'));
		$reccomandations 	= Reccomendation::whereUserId($user->id)->whereIn('friend_id', Input::get('friends'))->get();


		foreach($reccomandations as $reccomandation) {

			try {
				$reccomandation->products()->attach($product);
				$reccomandation->save();
			}
			catch(Exception $e) { /* Duplicate entry */ }
		}

		return Redirect::route('products.show', $product->id);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  Reccomendation $reccomendation
     * @return Response
     */
    public function destroy(Reccomendation $reccomendation)
    {
        //
    }

}