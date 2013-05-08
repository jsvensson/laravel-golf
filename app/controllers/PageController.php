<?php

class PageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Static Page Controller
	|--------------------------------------------------------------------------
	*/

	public function getFrontPage()
	{
    if (Sentry::check())
    {
      $user = User::find(Sentry::getUser()->id);
    }
    else {
      $user = false;
    }
		return View::make('hello')
      ->with('user', $user);
	}

}
