<?php

class AccountController extends BaseController {

  /**
   * Default action for Account controller.
   *
   * @return void
   */
  public function getIndex()
  {
    return View::make('account.index');
  }

  /**
   * Destroy user session.
   *
   * @return void
   */
  public function getLogout()
  {
    Auth::logout();
    return Redirect::to('/');
  }

  /**
   * User signup page view.
   *
   * @return void
   */
  public function getSignup()
  {
    return View::make('account.signup');
  }

  /**
   * User signup form POST target.
   *
   * @return void
   */
  public function postSignup()
  {
    $val = Validator::make(
      Input::all(),
      [
        'email' => 'required|email|unique:Users',
        'first_name' => 'required',
        'last_name' => 'required',
        'password' => 'required|min:6',
        'password_confirmation' => 'required_with:password|same:password'
      ]
    );

    if ($val->fails())
    {
      return Redirect::to('account/signup')
        ->withInput(Input::except('password', 'password_confirmation'))
        ->withErrors($val);
    }
    else
    {
      $user = User::create([
        'email' => Input::get('email'),
        'password' => Hash::make(Input::get('password')),
        'role' => 0,
        'active' => true
      ]);

      // Create profile
      $profile = new Profile([
        'first_name' => Input::get('first_name'),
        'last_name' => Input::get('last_name')
      ]);
      $user->profile()->save($profile);

      // Log new user in
      Auth::loginUsingId($user->id);
      return Redirect::to('home/');
    }
  }

  /**
   * Account credential reminder view.
   *
   * @return void
   */
  public function getReset()
  {
    echo("Account credential reminder page");
  }

  /**
   * Password reset token view.
   *
   * @return void
   */
  public function getResetToken($token)
  {
    echo("Reset token: " . $token);
  }

}

/* EOF */
