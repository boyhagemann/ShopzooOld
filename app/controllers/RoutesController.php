<?php

class RoutesController extends DeSmart\Layout\Controller
{
	protected $layout = 'layouts.default';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function products()
    {
		$this->structure['content'] = array(
			'ProductsController@index',
		);
		$this->structure['sidebar'] = array(
			'ReccomendationsController@drafts',
		);

		return $this->execute();
    }

}