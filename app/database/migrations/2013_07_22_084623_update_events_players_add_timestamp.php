<?php

use Illuminate\Database\Migrations\Migration;

class UpdateEventsPlayersAddTimestamp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events_players', function($table)
		{
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events_players', function($table)
		{
			$table->dropColumn('created_at', 'updated_at');
		});

	}

}
