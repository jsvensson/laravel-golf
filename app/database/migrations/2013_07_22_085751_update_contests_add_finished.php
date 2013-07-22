<?php

use Illuminate\Database\Migrations\Migration;

class UpdateContestsAddFinished extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contests', function($table)
		{
			$table->boolean('is_finished')
				->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contests', function($table)
		{
			$table->dropColumn('is_finished');
		});

	}

}
