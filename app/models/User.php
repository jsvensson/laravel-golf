<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

  /**
   * Fields accepted for mass assignment
   *
   * @var array
   */
  protected $fillable = [];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

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

  public function getFirstNameAttribute()
  {
    return $this->profile->first_name;
  }

  public function getLastNameAttribute()
  {
    return $this->profile->last_name;
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
    return trim($initial_name);
  }

}
