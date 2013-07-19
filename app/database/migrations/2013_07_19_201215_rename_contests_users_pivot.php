<?php

use Illuminate\Database\Migrations\Migration;

class RenameContestsUsersPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('users_contests', 'contests_players');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::rename('contests_players', 'users_contests');
	}

}
