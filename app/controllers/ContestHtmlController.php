<?php

class ContestHtmlController extends ContestBaseController
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $contests = parent::index();
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
    $contest = parent::store();

    // Validation
    if ( ! $contest->save()) {
      return Redirect::back()
        ->withInput()
        ->withErrors($contest->getValidatorMessages());
    }
    else {
      return Redirect::route('contest.show', $contest->id);
    }
  }

  public function show($contest_id)
  {
    $contest = parent::show($contest_id);
    $is_owner = ($contest->owner_id == User::currentId());
    return View::make('contest.show')
      ->with('is_owner', $is_owner)
      ->with('contest', $contest);
  }

  public function edit($contest_id)
  {
    $contest = parent::edit($contest_id);
    return View::make('contest.edit')
      ->with('contest', $contest);
  }

  public function update($contest_id)
  {
    $contest = parent::update($contest_id);
    return Redirect::route('contest.show', $contest->id);
  }

}

/* EOF */
