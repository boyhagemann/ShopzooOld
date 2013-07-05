<?php

namespace Blocks;

use DeSmart\Layout\Controller;

class UserController extends Controller
{
	protected $layout = 'layouts.default';

	/**
	 *
	 * @return Response
	 */
	public function login()
	{
		$this->structure['content'] = array(
			'UserController@login',
		);
		$this->structure['sidebar'] = array(
		);

		return $this->execute();
	}

	/**
	 *
	 * @return Response
	 */
	public function register()
	{
		$this->structure['content'] = array(
			'UserController@register',
		);
		$this->structure['sidebar'] = array(
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
			'UserController@show',
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
	public function stream()
	{
		$this->structure['content'] = array(
			'UserController@stream',
		);
		$this->structure['sidebar'] = array(
			'ReccomendationsController@drafts',
		);

		return $this->execute();
	}


}