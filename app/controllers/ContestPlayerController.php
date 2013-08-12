<?php

class ContestPlayerController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($contest_id)
	{
    $contest = Contest::findOrFail($contest_id);

    return View::make('contest.player.index')
      ->with('contest', $contest);
	}

  public function create($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);
    $nonplayers = $contest->nonPlayers();

    return View::make('contest.player.create')
      ->with('nonplayers', $nonplayers)
      ->with('contest', $contest);
  }

  public function store($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);

    // Attach players to contest
    foreach(Input::get('users') as $player_id) {
      $contest->players()->attach($player_id, ['is_active' => true]);

      // Attach all contest events to player
      foreach($contest->events as $event) {
        $event->players()->attach($player_id);
      }
    }

    return Redirect::route('contest.show', [$contest->id]);
  }

  public function show($contest_id, $player_id)
  {
    return "TODO: Show contest $contest_id results for player $player_id";
  }

  public function edit($contest_id, $player_id)
  {
    $contest = Contest::findOrFail($contest_id);
    $player  = User::findOrFail($player_id);
    $events  = $player->eventsForContest($contest->id)->get();

    return View::make('contest.player.edit')
      ->with('contest', $contest)
      ->with('events', $events)
      ->with('player', $player);
  }

}

/* EOF */
