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
  public event()
  {
    return $this->hasMany('Event');
  }

  /**
   * Event relationship for the model.
   *
   * @return object
   */
  public player()
  {
    return $this->hasMany('Player');
  }


}


/* EOF */
