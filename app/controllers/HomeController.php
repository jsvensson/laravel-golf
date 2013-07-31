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
    // New first/last name
    $u = Input::only('first_name', 'last_name');
    User::currentUser()->update($u);

    // Profile data
    $p = Input::only('profile_handicap', 'profile_website');

    // Rename keys due to Former input
    $p['handicap'] = $p['profile_handicap'];
    unset($p['profile_handicap']);
    $p['website'] = $p['profile_website'];
    unset($p['profile_website']);

    User::currentUser()->profile->update($p);

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
      return Redirect::back()
        ->withInput(Input::only('email'))
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
      'new_password_repeat' => 'required|same:new_password'
    ];

    $val = Validator::make($e, $rules);

    if ($val->fails()) {
      return Redirect::back()
        ->withInput(Input::all())
        ->withErrors($val);
    }
    else {
      $user = User::currentUser();
      $user->password = Input::get('new_password');
      $user->save();

      Session::flash('alert_type', 'success');
      Session::flash('alert', 'Ditt lösenord har ändrats.');

      return Redirect::to('home/settings');
    }

  }

}

/* EOF */
