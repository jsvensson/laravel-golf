<?php

class Contest extends Eloquent
{
  protected $table = 'contests';
  public $timestamps = true;

  /**
   * The attributes included in the model's JSON form.
   *
   * @var array
   */
  protected $fillable = ['owner_id', 'name', 'start_date', 'end_date'];

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
  public function players()
  {
    return $this->belongsToMany('User', 'users_contests');
  }

  /**
   * Owner relationship for the model.
   *
   * @return object
   */
  public function owner()
  {
    return $this->belongsTo('User');
  }

  public function getPlayerCountAttribute()
  {
    return count($this->players);
  }

  public function scopeAvailable($query)
  {
    $owner_id = Sentry::getUser()->id;

    return $query->where('is_open', '=', true)
      ->orWhere('owner_id', $owner_id);
  }

}


/* EOF */
