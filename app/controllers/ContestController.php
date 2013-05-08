<?php

class ContestController extends BaseController
{

  /**
   * Default action for Contest controller.
   *
   * @return void
   */
  public function getIndex()
  {
    return View::make('contest.index')
      ->with('user', $this->user);
  }

}

/* EOF */
