<?php

class PlayerController extends BaseController
{

  public function show($player_id)
  {
    return View::make('player.show');
  }

}

/* EOF */
