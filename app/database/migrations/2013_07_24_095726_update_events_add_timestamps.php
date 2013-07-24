<?php

use Illuminate\Database\Migrations\Migration;

class UpdateEventsAddTimestamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function($table) {
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
		Schema::table('events', function($table) {
			$table->dropColumn('created_at', 'updated_at');
		});
	}

}
