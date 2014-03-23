<?php

use League\Fractal\Resource;

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
    $resource = new Resource\Collection($contests, new ContestTransformer);
    return Response::json($this->toJsonArray($resource))
      ->setCallback(Input::get('callback'));
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
    $resource = new Resource\Item($contest, new ContestTransformer);
    return Response::json($this->toJsonArray($resource))
      ->setCallback(Input::get('callback'));
  }

  public function update($contest_id)
  {
    $contest = parent::update($contest_id);
    $resource = new Resource\Item($contest, new ContestTransformer);
    return Response::json($this->toJsonArray($resource))
    ->setCallback(Input::get('callback'));
  }

}

/* EOF */
