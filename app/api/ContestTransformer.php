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
      'players'     => $contest->players->toArray(),
      'events'      => [],
    ];

    // Massage events into proper format
    foreach($contest->events as $e) {

    }

    return $ary;
  }

}

/* EOF */
