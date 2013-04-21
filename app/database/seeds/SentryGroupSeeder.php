<?php

class SentryGroupSeeder extends Seeder
{
  public function run()
  {
    // Standard user group
    $group = Sentry::getGroupProvider()->create([
      'name' => 'user',
      'permissions' => [
        'admin' => 0,
      ]
    ]);

    // Full admin rights
    $group = Sentry::getGroupProvider()->create([
      'name' => 'admin',
      'permissions' => [
        'admin' => 1,
      ]
    ]);

  }

}

/* EOF */
