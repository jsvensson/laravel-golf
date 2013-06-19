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
   * Player controller
   */
  Route::get('home', 'PlayerController@getHome');
  Route::get('player/{id}', 'PlayerController@getShow');
  // Controller catch-all
  Route::controller('player', 'PlayerController');

  /*
   * Contest controller
   */
  Route::when('contest/create', 'auth');
  // Controller catch-all
  Route::controller('contest', 'ContestController');

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
