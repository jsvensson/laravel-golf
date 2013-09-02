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
    $contests = Contest::available()->get();

    return View::make('contest.index')
      ->with('contests', $contests);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('contest.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $contest = new Contest(Input::all());

    // Validation
    if ( ! $contest->save()) {
      return Redirect::back()
        ->withInput()
        ->withErrors($contest->getValidatorMessages());
    }
    else {
      // Attach and activate owner
      $contest->players()->attach(User::currentId(), ['is_active' => true]);

      return Redirect::route('contest.show', $contest->id);
    }
  }

  public function show($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    $is_owner = ($contest->owner_id == User::currentId());

    return View::make('contest.show')
      ->with('is_owner', $is_owner)
      ->with('contest', $contest);
  }

  public function edit($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    return View::make('contest.edit')
      ->with('contest', $contest);
  }

}

/* EOF */
