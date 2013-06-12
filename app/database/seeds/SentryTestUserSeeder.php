<?php

class SentryTestUserSeeder extends Seeder
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

    // Test users
    $test_users = [
      [
        'email'      => 'test1@example.net',
        'first_name' => 'Test',
        'last_name'  => 'User1',
        'password'   => 'testuser'
      ],
      [
        'email'      => 'test2@example.net',
        'first_name' => 'Test',
        'last_name'  => 'User2',
        'password'   => 'testuser'
      ],
      [
        'email'      => 'test3@example.net',
        'first_name' => 'Test',
        'last_name'  => 'User3',
        'password'   => 'testuser'
      ],
    ];

    // Seed with test accounts
    foreach ($test_users as $u) {
      User::register($u, false);
    }
  }
}

/* EOF */
