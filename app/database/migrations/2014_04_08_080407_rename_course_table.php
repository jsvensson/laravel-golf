<?php

use Illuminate\Database\Migrations\Migration;

class RenameCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('course_user', 'tee_user');
		Schema::table('tee_user', function($table) {
			$table->renameColumn('course_id', 'tee_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tee_user', function($table) {
			$table->renameColumn('tee_id', 'course_id');
		});
		Schema::rename('tee_user', 'course_user');
	}

}
