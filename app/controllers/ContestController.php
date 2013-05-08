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

  /**
   * Create action for Contest controller.
   *
   * @return void
   */
  public function getCreate()
  {
    if(Sentry::check()) {
      return View::make('contest.create')
        ->with('user', $this->user);
    }
    else {
      return Redirect::to('account/login')
        ->with('flash_error', 'Inloggning krävs.');
    }
  }

}

/* EOF */
