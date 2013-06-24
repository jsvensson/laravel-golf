<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

    $this->call('SentryGroupSeeder');       // Create default groups
    $this->call('SentrySuperUserSeeder');   // Create superuser account
    $this->call('SentryTestUserSeeder');    // Create test user accounts
	}

}
