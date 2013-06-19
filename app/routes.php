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
   * Home controller
   */
  Route::controller('home', 'HomeController');

  /*
   * Player controller (resource)
   */
  Route::resource('player', 'PlayerController');

  /*
   * Contest controller (resource)
   */
  Route::when('contest/create', 'auth');
  Route::resource('contest', 'ContestController');
  Route::resource('contest.players', 'ContestPlayerController');

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
