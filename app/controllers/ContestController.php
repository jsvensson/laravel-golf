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

  public function postCreate()
  {
    if (!Sentry::check()) {
      return Redirect::to('account/login')
        ->with('flash_error', 'Inloggning krävs.');
    }

    $val = Validator::make(
      Input::all(),
      [
        'name' => 'required',
        'start_date' => 'required|date_format:Y-m-d|before:' . Input::get('end_date'),
        'end_date' => 'required|date_format:Y-m-d|after:' . Input::get('start_date'),
      ]
    );

    if ($val->fails()) {
      return Redirect::to('contest/create')
        ->withInput(Input::all())
        ->withErrors($val);
    }
    else {
      // Validation passed, create contest
      $c = [
        'owner_id' => $this->user->id,
        'name'     => Input::get('name'),
      ];
    }
  }

}

/* EOF */
