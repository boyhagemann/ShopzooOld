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

	public function drafts()
	{
		$user 				= Sentry::getUser();
		$reccomendations 	= Reccomendation::whereUserId($user->id)->whereStatus('draft')->get();
		$friends 			= $user->friends;

		return View::make('reccomendations.drafts', compact('reccomendations', 'friends'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return View::make('reccomendations.create');
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
        return View::make('reccomendations.edit')->with(compact('reccomendation'));
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
	 * @param  Reccomendation $reccomendation
	 * @return Response
	 */
	public function send(Reccomendation $reccomendation)
	{

		foreach($reccomendation->products as $product) {
			$product->generateLink(Sentry::getUser());
		}

		$reccomendation->subject = Input::get('subject');
		$reccomendation->body = Input::get('body');
		$reccomendation->status = 'finished';
		$reccomendation->save();

		Mail::send('emails.reccomendation', compact('reccomendation'), function($mail) use ($reccomendation) {

			$mail->subject('New reccomendation from ' . Sentry::getUser()->name());
			$mail->to($reccomendation->friend->email);

			$reccomendation->status = 'sent';
			$reccomendation->save();
		});

		return Redirect::route('products')->with('success', 'Reccomendation sent!');
	}

	public function addFriend(User $friend)
	{
		$reccomendation = Reccomendation::whereFriendId($friend->id)->whereStatus('draft')->first();

		if(!$reccomendation) {
			$reccomendation = Reccomendation::create(array(
				'user_id' => Sentry::getUser()->id,
				'friend_id' => $friend->id,
				'status' => 'draft',
			));
			$reccomendation->save();
		}

		return Redirect::route('products')->with('success', 'Added friend. Find some products to reccomend!');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function addProduct()
	{
		$user 				= Sentry::getUser();
		$product 			= Product::find(Input::get('product_id'));
		$reccomandations 	= Reccomendation::whereUserId($user->id)->whereStatus('draft')->get();


		foreach($reccomandations as $reccomandation) {

			try {

				if(in_array($reccomandation->friend_id, Input::get('friends'))) {
					$reccomandation->products()->attach($product);
				}
				else {
					$reccomandation->products()->detach($product);
				}

				$reccomandation->save();
			}
			catch(Exception $e) { /* Duplicate entry */ }
		}

		return Redirect::route('products.show', $product->id)->with('success', 'Updated friend list with this product');
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