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
  Route::get('contest/create', ['before' => 'auth', 'uses' => 'ContestController@getCreate']);
  Route::post('contest/create', ['before' => 'auth', 'uses' => 'ContestController@postCreate']);
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
