<?php

use Illuminate\Database\Migrations\Migration;

class UpdateContestsRenameColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contests', function($table) {
			$table->renameColumn('is_open', 'is_public');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contests', function($table) {
			$table->renameColumn('is_public', 'is_open');
		});

	}

}
