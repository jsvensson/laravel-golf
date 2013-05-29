<?php
/*
|--------------------------------------------------------------------------
| Controller Routes
|--------------------------------------------------------------------------
|
*/

  /*
   * Account controller
   */
  Route::when('account/signup', 'guest');
  Route::when('account/login', 'guest');
  // Controller catch-all
  Route::controller('account', 'AccountController');

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
