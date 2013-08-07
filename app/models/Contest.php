<?php

class Contest extends Eloquent
{
  protected $table = 'contests';
  public $timestamps = true;

  /**
   * The attributes for any model validation errors.
   */
  protected $validation = null;

  /**
   * The attributes included in the model's JSON form.
   *
   * @var array
   */
  protected $fillable = ['owner_id', 'name', 'start_date', 'end_date'];

  public static function boot()
  {
    static::creating(function($contest) {
      if ( ! $contest->isValid()) return false;
    });

    static::updating(function($contest) {
      if ( ! $contest->isValid()) return false;
    });

  }

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

  public function nonPlayers()
  {
    $members = $this->players()->lists('user_id');
    return User::whereNotIn('id', $members)->get();
  }

  public function scopeAvailable($query)
  {
    $owner_id = User::currentId();

    return $query->where('is_public', true)
      ->orWhere('owner_id', $owner_id)
      ->with('owner', 'events', 'players');
  }

  public function isValid()
  {
    $val = Validator::make(
      $this->toArray(),
      [
        'name'       => 'required',
        'owner_id'   => 'required|size:' . User::currentId(),
        'start_date' => 'required|date_format:Y-m-d|before:' . Input::get('end_date'),
        'end_date'   => 'required|date_format:Y-m-d|after:' . Input::get('start_date'),
      ]
    );

    if ($val->fails()) {
      $this->validation = $val->messages();
    }

    return $val->passes();
  }

  public function getValidatorMessages()
  {
    return $this->validation;
  }

}


/* EOF */
