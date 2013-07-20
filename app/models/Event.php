<?php

class Event extends Eloquent
{

  protected $table = 'events';
  public $timestamps = true;

  /**
   * The attributes included in the model's JSON form.
   *
   * @var array
   */
  protected $fillable = [];

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
   * Player relationship for the model. An Event has many Players.
   *
   * @return object
   */
  public function players()
  {
    return $this->belongsToMany('User', 'events_users');
  }

}

/* EOF */