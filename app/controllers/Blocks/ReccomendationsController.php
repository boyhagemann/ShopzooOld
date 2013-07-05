<?php

namespace Blocks;

use DeSmart\Layout\Controller;

class ReccomendationsController extends Controller
{
	protected $layout = 'layouts.default';

	/**
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->structure['content'] = array(
			'ReccomendationsController@index',
		);
		$this->structure['sidebar'] = array(
		);

		return $this->execute();
	}

    /**
     *
     * @return Response
     */
    public function edit(\Reccomendation $reccomendation)
    {
		$this->structure['content'] = array(
			'ReccomendationsController@edit',
		);
		$this->structure['sidebar'] = array(
		);

		return $this->execute(compact('reccomendation'));
    }

}