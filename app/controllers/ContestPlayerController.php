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
    $players = $contest->players;

    return View::make('contest.players.index')
      ->with('contest', $contest)
      ->with('players', $players)
      ->with('user', $this->user);
	}

}

/* EOF */
