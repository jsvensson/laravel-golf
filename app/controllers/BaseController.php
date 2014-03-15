<?php

use League\Fractal;

class BaseController extends Controller {

  protected $layout = 'layout.default';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function toJsonArray($resource)
	{
		$fractal = new Fractal\Manager();
		return $fractal->createData($resource)->toArray();
	}

}
