<?php

use League\Fractal;

class ContestTransformer extends Fractal\TransformerAbstract
{

  public function transform(Contest $contest)
  {
    $ary = [
      'id'          => (int) $contest->id,
      'owner_id'    => (int) $contest->owner_id,
      'name'        => $contest->name,
      'is_public'   => (bool) $contest->is_public,
      'is_finished' => (bool) $contest->is_open,
      'start_date'  => $contest->start_date,
      'end_date'    => $contest->end_date,
      'players'     => [],
      'events'      => [],
    ];

    // Massage players into proper format
    foreach($contest->players->toArray() as $p) {
      $ary['players'][] = [
        'id'           => (int) $p['id'],
        'first_name'   => $p['first_name'],
        'last_name'    => $p['last_name'],
        'initial_name' => $p['initial_name'],
      ];
    }

    // Massage events into proper format
    foreach($contest->events->toArray() as $e) {
      // Basic event info
      $event = [
        'id'      => (int) $e['id'],
        'name'    => $e['name'],
        'date'    => $e['date'],
        'players' => [],
      ];

      // Loop through player event results
      foreach($e['players'] as $player) {
        $event['players'][] = [
          'id'           => (int) $player['id'],
          'first_name'   => $player['first_name'],
          'last_name'    => $player['last_name'],
          'initial_name' => $player['initial_name'],
          'score' => (is_null($player['pivot']['score']) ? $player['pivot']['score'] : (int) $player['pivot']['score']),
        ];
      }

      $ary['events'][] = $event;
    }

    return $ary;
  }

}

/* EOF */
