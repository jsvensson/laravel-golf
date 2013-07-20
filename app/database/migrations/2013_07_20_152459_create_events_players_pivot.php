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
			$table->integer('event_id')
				->unsigned();
			$table->foreign('event_id')
			  ->references('id')
			  ->on('events');

			$table->integer('player_id')
				->unsigned();
			$table->foreign('player_id')
			  ->references('id')
			  ->on('users');

			$table->integer('score');

			$table->primary(array('event_id', 'player_id'));
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
