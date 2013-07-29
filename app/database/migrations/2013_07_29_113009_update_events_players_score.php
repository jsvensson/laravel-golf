<?php

use Illuminate\Database\Migrations\Migration;

class UpdateEventsPlayersScore extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Make `score` nullable
		DB::statement("ALTER TABLE events_players CHANGE COLUMN score score INT;");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement("ALTER TABLE events_players CHANGE COLUMN score score INT NOT NULL;");
	}

}
