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

  public function getSettings()
  {
    return View::make('account.settings')
      ->with('user', $this->user);
  }

}

/* EOF */
