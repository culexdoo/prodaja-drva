<?php

/*
*	Core controller
*   
*	Extends the magnificent Controller, controlls main backend layout
*/


class BaseController extends Controller
{


	// Enviroment variables
	protected $layout;
	protected $repo;

	// Constructing default values
	public function __construct() {

		$this->layout = "master";
		$this->repo = new CoreRepository;

    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}
