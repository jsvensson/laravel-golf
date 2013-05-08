<?php

class Contest extends Eloquent
{
  protected $table = 'contests';
  public $timestamps = true;

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * Event relationship for the model.
   *
   * @return object
   */
  public function event()
  {
    return $this->hasMany('Event');
  }

  /**
   * Player relationship for the model.
   *
   * @return object
   */
  public function player()
  {
    return $this->hasMany('Player');
  }

  /**
   * Owner relationship for the model.
   *
   * @return object
   */
  public function owner()
  {
    return $this->belongsTo('Player');
  }

}


/* EOF */
