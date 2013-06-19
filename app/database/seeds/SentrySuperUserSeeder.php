<?php

class SentrySuperUserSeeder extends Seeder
{
  public function run()
  {
    // Create initial superuser
    $superuser = [
    'email'      => 'root@example.net',
    'first_name' => 'Master',
    'last_name'  => 'Account',
    'password'   => 'changeme'
    ];
    $su = User::register($superuser, true);

    // Set superuser permissions
    $group = Sentry::getGroupProvider()->findByName('superuser');
    $su->addGroup($group);
  }
}

/* EOF */
