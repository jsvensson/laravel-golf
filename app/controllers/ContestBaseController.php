<?php

class ContestBaseController extends BaseController
{

  /**
   * Display a listing of the resource.
   *
   * @return Array
   */
  public function index()
  {
    $contests = Contest::available()->get();
    return $contests;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    throw new Exception('Not implemented');
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
    if ($contest->save()) {
      // Attach and activate owner
      $contest->players()->attach(User::currentId(), ['is_active' => true]);
    }
    return $contest;
  }

  /**
   * Fetch a Contest from database.
   *
   * @return Contest
   */
  public function show($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    $contest->load('players', 'courses', 'courses.players');
    return $contest;
  }

  /**
   * Fetch a Contest from database to edit it.
   *
   * @return Contest
   */
  public function edit($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    return $contest;
  }

  public function update($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    $contest->update(Input::all());
    return $contest;
  }

}

/* EOF */
