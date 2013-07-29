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
  public function events()
  {
    return $this->hasMany('ContestEvent');
  }

  /**
   * Player relationship for the model.
   *
   * @return object
   */
  public function players()
  {
    return $this->belongsToMany('User', 'contests_players');
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

  public function scopeAvailable($query)
  {
    $owner_id = User::currentId();

    return $query->where('is_open', true)
      ->orWhere('owner_id', $owner_id);
  }

}


/* EOF */
