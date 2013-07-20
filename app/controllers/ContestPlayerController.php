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

}

/* EOF */
