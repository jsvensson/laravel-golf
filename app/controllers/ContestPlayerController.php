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
      $user = User::findOrFail($player_id);
      $contest->attachPlayer($user, true);

      // Attach all contest tees to player
      foreach($contest->tees as $tee) {
        $tee->attachPlayer($user);

        // Create Result for each new event for the players
        $result = new Result([
          'user_id'    => $player_id,
          'contest_id' => $tee->contest->id,
          'event_id'   => $tee->id,
        ]);
        $result->save();
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
    $tees    = Tee::forContest($contest)->get();
    $results = Result::forPlayer($player)->forContest($contest)->get();

    return View::make('contest.player.edit')
      ->with('contest', $contest)
      ->with('tees', $tees)
      ->with('player', $player)
      ->with('results', $results);
  }

  public function update($contest_id, $player_id)
  {
    $contest = Contest::findOrFail($contest_id);
    $player = User::findOrFail($player_id);

    $scores = Input::get('events');

    $player->events()->sync($scores, false);

    return Input::get('events');
  }

}

/* EOF */
