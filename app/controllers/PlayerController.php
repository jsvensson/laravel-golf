<?php

class PlayerController extends BaseController
{

  public function show($player_id)
  {
    return View::make('player.show')
      ->with('user', $this->user);
  }

}

/* EOF */
