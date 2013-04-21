<?php

class PlayerController extends BaseController
{

  /**
   * Default action for Player controller.
   *
   * @return void
   */
  public function getIndex()
  {
    return View::make('player.index');
  }

  public function getHome()
  {
    $user = Auth::user();

    return View::make('player.home');
  }

  public function getShow($player_id)
  {
    return View::make('player.show');
  }

}

/* EOF */
