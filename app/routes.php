<?php
/*
|--------------------------------------------------------------------------
| Controller Routes
|--------------------------------------------------------------------------
|
*/

  /*
   * Authorization controller
   */
  Route::when('auth/signup', 'guest');
  Route::when('auth/login', 'guest');
  Route::controller('auth', 'AuthController');

  /*
   * Authorization required for all 'create' and 'store' routes
   */
  Route::when('*/create', 'auth');
  Route::when('*/store', 'auth');

  /*
   * Home controller
   */
  Route::controller('home', 'HomeController');

  /*
   * Player controller (resource)
   */
  Route::resource('player', 'PlayerController', ['only' => ['show']]);

  /*
   * Contest controller (resource)
   */
  Route::resource('contest', 'ContestController');
  Route::resource('contest.player', 'ContestPlayerController', ['only' => ['index', 'show', 'create', 'store']]);
  Route::resource('contest.event', 'ContestEventController');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PageController@getFrontPage');

/* EOF */
