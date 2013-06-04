<?php

class AdvicesController extends BaseController
{    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $advices = Advice::paginate(10);
        
        return View::make('advices.index', compact('advices'));
    }

	public function create()
	{
		return View::make('advices.create');
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Advice::$rules);

		if($validator->fails()) {
			return Redirect::route('advices.recipient.add')->withErrors($validator->errors());
		}

		$advice = new Advice();
		$advice->subject 	= Input::get('subject');
		$advice->body 		= Input::get('body');
		$advice->save();

		return Redirect::route('advices.show', $advice->id)->with('success', 'Advice created');
	}

	public function show(Advice $advice)
	{
		return View::make('advices.show', compact('advice'));
	}

	public function edit(Advice $advice)
	{
		return View::make('advices.edit', compact('advice'));
	}

	public function update(Advice $advice)
	{
		$validator = Validator::make(Input::all(), Advice::$rules);

		if($validator->fails()) {
			return Redirect::route('advices.recipient.edit', $advice->id)->withErrors($validator->errors());
		}

		$advice->subject = Input::get('subject');
		$advice->body = Input::get('body');
		$advice->save();

		return Redirect::route('advices.show', $advice->id)->with('succes', 'Advice updated');
	}

	public function addRecipient(Advice $advice)
	{
		return View::make('advices.recipient', compact('advice'));
	}

	public function storeRecipient(Advice $advice)
	{
		try {

			$validator = Validator::make(Input::all(), array(
				'email' => 'required|email',
			));

			if($validator->fails()) {
				return Redirect::route('advices.recipient.add', $advice->id)->withErrors($validator->errors());
			}

			$user = User::whereEmail(Input::get('email'))->first();
			if(!$user) {
				$user = new User();
				$user->email = Input::get('email');
				$user->save();
			}

			$adviceUser = new AdviceUser();
			$adviceUser->user_id = $user->id;
			$adviceUser->advice_id = $advice->id;
			$adviceUser->save();
		}
		catch(Exception $e) {
		}

		return Redirect::route('advices.show', $advice->id)->with('success', 'Friend added to advice');
	}

	public function removeRecipient(User $user)
	{
		$adviceUser = AdviceUser::whereUserId($user->id)->first();
		if(!$adviceUser) {
			return Redirect::route('advices.index')->with('error', 'User does nog belong to any advice');
		}

		$advice = $adviceUser->advice;
		$adviceUser->delete();

		return Redirect::route('advices.show', $advice->id)->with('success', 'Recipient removed');
	}

	public function addLink()
	{
		if(!Input::get('advice')) {
			return Redirect::route('advices.create');
		}

		try {
			$adviceLink = new AdviceLink();
			$adviceLink->link_id = Input::get('link');
			$adviceLink->advice_id = Input::get('advice');
			$adviceLink->save();
		}
		catch(Exception $e) {
		}

		return Redirect::route('advices.show', Input::get('advice'))->with('success', 'Link added to advice');
	}

	public function removeLink(Link $link)
	{
		$adviceLink = AdviceLink::whereLinkId($link->id)->first();
		if(!$adviceLink) {
			return Redirect::route('advices.index')->with('error', 'Link does nog belong to any advice');
		}

		$advice = $adviceLink->advice;
		$adviceLink->delete();

		return Redirect::route('advices.show', $advice->id)->with('success', 'Link removed');
	}

	/**
	 * @param Advice $advice
	 * @return Response
	 */
	public function send(Advice $advice)
	{
		foreach($advice->to as $user) {
			$this->sendOne($advice, $user);
		}

		return Redirect::route('advices.show', $advice->id)->with('success', 'Advice is sent');
	}

	/**
	 * @param Advice $advice
	 * @param User   $user
	 */
	public function sendOne(Advice $advice, User $user)
	{
		Mail::send('emails.advice', compact('advice', 'user'), function($message) use($user, $advice) {

			$message->to($user->email);
			$message->subject($advice->subject);
		});
	}
}