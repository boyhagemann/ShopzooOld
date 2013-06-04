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
		var_dump('create'); exit;

	}

	public function store()
	{
		var_dump('store'); exit;
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
		var_dump('update'); exit;
	}

	public function addLink()
	{
		if(!Input::get('advice')) {
			return Redirect::route('advices.create');
		}

		try {
			$error = null;
			$adviceLink = new AdviceLink();
			$adviceLink->link_id = Input::get('link');
			$adviceLink->advice_id = Input::get('advice');
			$adviceLink->save();
		}
		catch(Exception $e) {
		}

		return Redirect::route('advices.show', Input::get('advice'))->with('success', 'Link added to advice');
	}

	public function removeLink()
	{

	}
}