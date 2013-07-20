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
    return "Creating event for contest $contest_id";
  }

}

/* EOF */
