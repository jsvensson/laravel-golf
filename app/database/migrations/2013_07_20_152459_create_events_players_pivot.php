<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsPlayersPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events_players', function($table)
		{
			$table->integer('contest_event_id')
				->unsigned();
			$table->integer('user_id')
				->unsigned();

			$table->integer('score');

			$table->primary(array('contest_event_id', 'user_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events_players');
	}

}
