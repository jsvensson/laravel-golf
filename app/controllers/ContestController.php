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
    return View::make('contest.create')
      ->with('user', $this->user);
  }

  public function postCreate()
  {
    $val = Validator::make(
      Input::all(),
      [
        'name'       => 'required',
        'start_date' => 'required|date_format:Y-m-d|before:' . Input::get('end_date'),
        'end_date'   => 'required|date_format:Y-m-d|after:' . Input::get('start_date'),
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
        'owner_id'   => $this->user->id,
        'name'       => Input::get('name'),
        'start_date' => Input::get('start_date'),
        'end_date'   => Input::get('end_date')
      ];

      $contest = new Contest($c);

      $contest->save();

      // TODO: contest view
      return $contest;
    }
  }

  public function getShow($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    return View::make('contest.show')
      ->with('contest', $contest)
      ->with('user', $this->user);
  }

}

/* EOF */
