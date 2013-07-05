<?php

namespace Blocks;

use DeSmart\Layout\Controller;

class FriendsController extends Controller
{
	protected $layout = 'layouts.default';

    /**
     *
     * @return Response
     */
    public function index()
    {
		$this->structure['content'] = array(
			'FriendsController@invite',
			'FriendsController@index',
		);
		$this->structure['sidebar'] = array(
		);

		return $this->execute();
    }

	/**
	 *
	 * @return Response
	 */
	public function invite()
	{
		$this->structure['content'] = array(
			'FriendsController@invite',
		);
		$this->structure['sidebar'] = array(
		);

		return $this->execute();
	}
}