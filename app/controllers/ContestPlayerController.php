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

    return View::make('contest.players.index')
      ->with('contest', $contest);
	}

  public function create($contest_id)
  {
    $contest = Contest::findOrFail($contest_id);

    return View::make('contest.players.create')
      ->with('contest', $contest);
  }

  public function show($contest_id, $player_id)
  {
    return "TODO: Show contest $contest_id results for player $player_id";
  }

}

/* EOF */
