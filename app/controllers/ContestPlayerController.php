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
    $nonmembers = $contest->nonPlayers();

    return View::make('contest.player.create')
      ->with('nonmembers', $nonmembers)
      ->with('contest', $contest);
  }

  public function store($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);

    // Get integers out of the input while screaming in horror at this piece of code
    $keys = [];
    foreach(array_keys(Input::all()) as $arr) {
      if (is_int($arr)) { $keys[] = $arr; }
    }

    // Attach players to contest
    foreach($keys as $player_id) {
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

}

/* EOF */
