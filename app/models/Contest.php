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

  protected $hidden = [
    'created_at', 'updated_at',
  ];

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
  public function tees()
  {
    return $this->hasMany('Tee');
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
    $user = User::getUser();

    $query->where('is_public', true)
      ->with('owner', 'tees', 'players');

    // Check when logged in
    if($user) {
      $query->orWhere('owner_id', $user->id);
      if(Contest::count() >= 1) {
        $query->orWhereIn('id', $user->contests()->lists('contest_id'));
      }
    }

    return $query;
  }

  public function isValid()
  {
    $val = Validator::make(
      $this->toArray(),
      [
        'name'       => 'required',
        'owner_id'   => 'required|integer|size:' . User::currentId(),
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

  public function getIsPublicAttribute($value)
  {
    return (bool) $value;
  }

  public function getIsFinishedAttribute($value)
  {
    return (bool) $value;
  }

  /**
   * Attach a player to the contest.
   *
   * @param User  The user object to attach
   * @param bool  Flag player as active in the contest
   */
  public function attachPlayer(User $user, $is_active = false)
  {
    $this->players()->attach($user->id, ['is_active' => $is_active]);

  }

}


/* EOF */
