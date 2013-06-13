<?php

class SentrySuperUserSeeder extends Seeder
{
  public function run()
  {
    // Create initial superuser
    $superuser = [
    'email'      => 'johan@atomicplayboy.net',
    'first_name' => 'Johan',
    'last_name'  => 'Svensson',
    'password'   => 'changeme'
    ];
    $su = User::register($superuser, true);

    // Set superuser permissions
    $group = Sentry::getGroupProvider()->findByName('superuser');
    $su->addGroup($group);
  }
}

/* EOF */
