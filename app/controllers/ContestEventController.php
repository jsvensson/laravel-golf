<?php

class ContestEventController extends BaseController
{

  public function index($contest_id)
  {
    return "Showing events for contest $contest_id";
  }

  public function show($contest_id, $event_id)
  {
    $events = Contest::find($contest_id)->events();
    return "Showing event $event_id for contest $contest_id";
  }

  public function create($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    return View::make('contest.event.create')
      ->with('contest', $contest);
  }

}

/* EOF */
