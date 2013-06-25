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

}

/* EOF */
