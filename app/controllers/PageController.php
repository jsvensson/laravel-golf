<?php

class PageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Static Page Controller
	|--------------------------------------------------------------------------
	*/

	public function getFrontPage()
	{
		return View::make('hello')
      ->with('user', $this->user);
	}

}
