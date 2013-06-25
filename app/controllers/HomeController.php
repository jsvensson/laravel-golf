<?php

class HomeController extends BaseController {

  /**
   * Default action for Account controller.
   *
   * @return void
   */
  public function getIndex()
  {
    return View::make('home.index')
      ->with('user', $this->user);
  }

  public function getSettings()
  {
    return View::make('home.settings')
      ->with('user', $this->user);
  }

  public function postSettings()
  {
    $p = Input::only('first_name', 'last_name', 'handicap', 'website');
    $this->user->profile->update($p);
    return Redirect::to('home/settings');
  }

  public function getSetEmail()
  {
    return View::make('home.set_email')
      ->with('user', $this->user);
  }

  public function postSetEmail()
  {
    $e = Input::only('email');

    $this->user->email = $e['email'];
    $this->user->save();

    return Redirect::to('home/set-email');
  }

}

/* EOF */
