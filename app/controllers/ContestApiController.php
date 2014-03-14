<?php

class ContestApiController extends ContestBaseController
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $contests = parent::index();
    return $contests;
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
    // TODO: build a JSON error message
    if ( ! $contest->save()) {
      return Redirect::back()
        ->withInput()
        ->withErrors($contest->getValidatorMessages());
    }
    else {
      return $contest;
    }
  }

  public function show($contest_id)
  {
    $contest = parent::show($contest_id);
    return $contest;
  }

  public function edit($contest_id)
  {
    $contest = parent::edit($contest_id);
    return $contest;
  }

  public function update($contest_id)
  {
    $contest = parent::update($contest_id);
    return $contest;
  }

}

/* EOF */