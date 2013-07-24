<?php

class PageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Static Page Controller
	|--------------------------------------------------------------------------
	*/

	public function getFrontPage()
	{
    $count['users'] = DB::table('users')->count();
    $count['contests'] = DB::table('contests')->count();
    $count['events'] = DB::table('events')->count();

		return View::make('hello')
      ->with('count', $count);
	}

}
