<?php

use Illuminate\Database\Migrations\Migration;

class UpdateEventAddDate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function($table) {
			$table->date('date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events', function($table) {
			$table->dropColumn('date');
		});

	}

}
