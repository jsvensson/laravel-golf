<?php

class ContestEventController extends BaseController
{

  public function index($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);

    return View::make('contest.event.index')
      ->with('contest', $contest);
  }

  public function show($contest_id, $event_id)
  {
    $event = ContestEvent::findOrFail($event_id);

    return View::make('contest.event.show')
      ->with('event', $event);
  }

  public function create($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    return View::make('contest.event.create')
      ->with('contest', $contest);
  }

  public function store($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);

    $event = new ContestEvent([
      'contest_id' => $contest->id,
      'name' => Input::get('name'),
      'date' => Input::get('date')
    ]);
    $event->save();

    return Redirect::route('contest.event.show', [$contest->id, $event->id]);
  }

}

/* EOF */
