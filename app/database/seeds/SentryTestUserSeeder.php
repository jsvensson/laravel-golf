<?php

class SentryTestUserSeeder extends Seeder
{
  public function run()
  {
    // Test users
    $users = [
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
    foreach ($users as $u) {
      $newuser = Sentry::getUserProvider()->create([
        'email'    => $u['email'],
        'password' => $u['password']
      ]);

      // Assign to default group
      $group = Sentry::getGroupProvider()->findByName('default');
      $newuser->addGroup($group);

      // Activation doodads
      $activation = $newuser->getActivationCode();
      $newuser->attemptActivation($activation);

      // Fetch User model object instead of Sentry object
      $user_id = Sentry::getUserProvider()
        ->findByLogin($u['email'])
        ->id;
      $user = User::find($user_id);

      // Create profile
      $profile = [
        'user_id'    => $user->id,
        'first_name' => $u['first_name'],
        'last_name'  => $u['last_name']
      ];
      $user->profile()->insert($profile);
    };
  }
}

/* EOF */
