<?php

class Result extends Eloquent
{

  protected $table = 'results';
  public $timestamps = true;

  /**
   * The attributes included in the model's JSON form.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'contest_id', 'event_id'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'created_at', 'updated_at',
  ];

  /**
   * Contest relationship for the model. An Event belongs to a Contest.
   *
   * @return object
   */
  public function contest()
  {
    return $this->belongsTo('Contest');
  }

  /**
   * Player relationship for the model. An Event belongs to a Player.
   *
   * @return object
   */
  public function player()
  {
    return $this->belongsTo('User');
  }

  /**
   * Player relationship for the model. A Result belongs to an Event.
   *
   * @return object
   */
  public function tee()
  {
    return $this->belongsTo('Tee');
  }

  public function scopeForContest($query, Contest $contest)
  {
    return $query->where('contest_id', $contest->id);
  }

  public function scopeForPlayer($query, User $player)
  {
    return $query->where('user_id', $player->id);
  }

}

/* EOF */
