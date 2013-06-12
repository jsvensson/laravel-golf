<?php

class SentryTestUserSeeder extends Seeder
{
  public function run()
  {
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
