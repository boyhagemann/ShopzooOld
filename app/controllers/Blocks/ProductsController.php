<?php

namespace Blocks;

use DeSmart\Layout\Controller;

class ProductsController extends Controller
{
	protected $layout = 'layouts.default';

    /**
     *
     * @return Response
     */
    public function index()
    {
		$this->structure['content'] = array(
			'ProductsController@index',
		);
		$this->structure['sidebar'] = array(
			'ReccomendationsController@drafts',
		);

		return $this->execute();
    }

	/**
	 *
	 * @return Response
	 */
	public function show()
	{
		$this->structure['content'] = array(
			'ProductsController@show',
		);
		$this->structure['sidebar'] = array(
			'ReccomendationsController@drafts',
		);

		return $this->execute();
	}
}