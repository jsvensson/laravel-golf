<?php

use Illuminate\Database\Migrations\Migration;

class DropTableContestsEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('contests_events');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('contests_events', function($table)
		{
		  $table->integer('contest_id')
		    ->unsigned();
		  $table->integer('event_id')
		    ->unsigned();
		  $table->primary(array('contest_id', 'event_id'));
		});

	}

}
