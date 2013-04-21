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

}

/* EOF */
