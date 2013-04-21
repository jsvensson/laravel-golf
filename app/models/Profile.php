<?php

class Profile extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'UserProfiles';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * Fields accepted for mass assignment
     *
     * @var array
     */
    protected $fillable = [
      'first_name', 'last_name', 'website',
      'handicap'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Entity relationships for the model.
     *
     * @return object
     */
    public function user()
    {
      return $this->belongsTo('User');
    }

}
