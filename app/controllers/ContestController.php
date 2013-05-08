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
    // TODO: open contests only
    $contests = Contest::all();

    return View::make('contest.index')
      ->with('contests', $contests)
      ->with('user', $this->user);
  }

}

/* EOF */
