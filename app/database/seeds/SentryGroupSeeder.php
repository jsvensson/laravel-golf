<?php

class SentryGroupSeeder extends Seeder
{
  public function run()
  {
    // Default user group
    $group = Sentry::getGroupProvider()->create([
      'name' => 'default',
      'permissions' => [
        'contest.create' => 1,
        'contest.invite' => 1,
        'contest.lock'   => 1,
        'contest.edit'   => 1,
      ]
    ]);

    // Full admin rights
    $group = Sentry::getGroupProvider()->create([
      'name' => 'admin',
      'permissions' => [
        'admin' => 1,
      ]
    ]);

    // Superuser root group
    $group = Sentry::getGroupProvider()->create([
      'name' => 'superuser',
      'permissions' => [
        'superuser' => 1,
      ]
    ]);
  }

}

/* EOF */
