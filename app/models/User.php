<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel implements UserInterface, RemindableInterface {

  /**
   * Fields accepted for mass assignment
   *
   * @var array
   */
  protected $fillable = [];

	/**
	 * The attributes visible in the model's JSON form.
	 *
	 * @var array
	 */
	protected $visible = [
    'id',
    'first_name', 'last_name',
    'pivot',
  ];

  /**
   * The attributes appended to the model's JSON form.
   *
   * @var array
   */
  protected $appends = [
   'initial_name'
  ];

  /**
   * Entity relationships for the model.
   *
   * @return object
   */
  public function profile()
  {
    return $this->hasOne('Profile');
  }

  /**
   * Contest relationship for the model. A Player belongs to many Contests.
   *
   * @return object
   */
  public function contests()
  {
    return $this->belongsToMany('Contest', 'contests_players')
      ->withPivot('is_active');
  }

  /**
   * Tee relationship for the model. A Player belongs to many Tees.
   *
   * @return object
   */
  public function tees()
  {
    return $this->belongsToMany('Tee');
  }

  public function results()
  {
    return $this->hasMany('Result');
  }

  public function teesForContest($contest)
  {
    return $this->tees()
      ->where('contest_id', $contest->id);
  }

  public static function register($u, $activate = false)
  {
    Log::info('Creating user ' . $u['email'] . ", activate = " . ($activate ? 'true' : 'false'));
    $newuser = Sentry::getUserProvider()->create([
      'email'      => $u['email'],
      'password'   => $u['password'],
      'first_name' => $u['first_name'],
      'last_name'  => $u['last_name']
    ]);
    Log::info('Created user id->' . $newuser->id);

    // Assign to default group
    $group = Sentry::getGroupProvider()->findByName('default');
    $newuser->addGroup($group);

    // Fetch User model object instead of Sentry object
    $user_id = Sentry::getUserProvider()->findByLogin($u['email'])->id;
    $user = User::find($user_id);

    // Create profile
    $user->profile()->save(new Profile());

    // Activate user?
    if ($activate === true) {
      $activation = $newuser->getActivationCode();
      $newuser->attemptActivation($activation);
    }

    return $newuser;
  }

  public static function getUser()
  {
    return Sentry::getUser();
  }

  public static function currentId()
  {
    if ($u = User::getUser()) {
      return $u->id;
    }
    else {
      return false;
    }
  }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

  public function getFullNameAttribute()
  {
    $full_name = trim("{$this->first_name} {$this->last_name}");
    return $full_name;
  }

  public function getInitialNameAttribute()
  {
    $initial = substr($this->last_name, 0, 1);
    $initial_name = trim("{$this->first_name} {$initial}");
    return $initial_name;
  }

  public function permissions()
  {
    $usr = Sentry::getUserProvider()->findById($this->id);
    return $usr->getMergedPermissions();
  }

  public function getRememberToken()
  {
      return $this->remember_token;
  }

  public function setRememberToken($value)
  {
      $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
      return 'remember_token';
  }

}
