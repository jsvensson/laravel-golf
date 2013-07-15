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
      $user = User::currentUser();
      $user->email = $e['email'];
      $user->save();

      Session::flash('alert_type', 'success');
      Session::flash('alert', 'Din email-adress är nu <b>' . $e['email'] . '</b>.');

      return Redirect::to('home/settings');
    }
  }

  public function getPassword()
  {
    return View::make('home.password');
  }

  public function postPassword()
  {
    $user_id = User::currentId();
    $e = Input::only('old_password', 'new_password', 'new_password_repeat');

    $rules = [
      'old_password'        => "required|check_password:$user_id",
      'new_password'        => 'required',
      'new_password_repeat' => 'required'
    ];

    $val = Validator::make($e, $rules);

    if ($val->fails()) {
      return Redirect::to('home/password')
        ->withInput(Input::all())
        ->withErrors($val);
    }
    else {
      $user = User::currentUser();
      $user->password = Input::get('new_password');
      $user->save();

      return Redirect::to('home/settings');
    }

  }

}

/* EOF */
