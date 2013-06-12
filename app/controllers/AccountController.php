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
   * Login page view.
   *
   * @return void
   */
  public function getLogin()
  {
    return View::make('account.login');
  }

  /**
   * Login form POST target.
   *
   * @return void
   */
  public function postLogin()
  {
    $attempt = Input::only('email', 'password');

    if (Sentry::authenticate($attempt)) {
      // Login success
      return Redirect::to('/')
        ->with('flash_notice', 'Inloggning lyckad');
    }
    else {
      // Login failure
      return Redirect::to('account/login')
        ->with('flash_error', 'Felaktigt inloggningsförsök.')
        ->withInput(Input::except('password'));
    }
  }

  /**
   * Destroy user session.
   *
   * @return void
   */
  public function getLogout()
  {
    Sentry::logout();
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
        'email'                 => 'required|email|unique:users',
        'first_name'            => 'required',
        'last_name'             => 'required',
        'password'              => 'required|min:6',
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
      $newuser = User::register(Input::all(), true);

      // Log new user in
      Sentry::login($newuser);
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
