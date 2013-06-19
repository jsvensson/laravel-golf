<?php

class ContestController extends BaseController
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    // FIXME: fulhack
    $contests = Contest::where('is_open', true)->get();

    return View::make('contest.index')
      ->with('contests', $contests)
      ->with('user', $this->user);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('contest.create')
      ->with('user', $this->user);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
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
      $contest->players()->attach($this->user->id);

      // TODO: contest view
      return Redirect::to('contest/show/' . $contest->id);
    }
  }

  public function show($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    return View::make('contest.show')
      ->with('contest', $contest)
      ->with('user', $this->user);
  }

}

/* EOF */
