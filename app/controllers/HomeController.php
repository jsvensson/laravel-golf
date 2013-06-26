<?php

class HomeController extends BaseController {

  /**
   * Default action for Account controller.
   *
   * @return void
   */
  public function getIndex()
  {
    return View::make('home.index');
  }

  public function getSettings()
  {
    return View::make('home.settings');
  }

  public function postSettings()
  {
    $p = Input::only('first_name', 'last_name', 'handicap', 'website');
    $this->user->profile->update($p);
    return Redirect::to('home/settings');
  }

  public function getEmail()
  {
    return View::make('home.email');
  }

  public function postEmail()
  {
    $e = Input::only('email', 'email2');

    $rules = [
      'email'  => 'required|email|unique:users',
      'email2' => 'required|same:email'
    ];

    $val = Validator::make($e, $rules);

    if ($val->fails()) {
      return Redirect::to('home/email')
        ->withInput(Input::all())
        ->withErrors($val);
    }
    else {
      $this->user->email = $e['email'];
      $this->user->save();

      Session::flash('alert_type', 'success');
      Session::flash('alert', 'Din email-adress är nu <b>' . $e['email'] . '</b>.');

      return Redirect::to('home/settings');
    }
  }

  public function getPassword()
  {
    return View::make('home.password');
  }

}

/* EOF */
