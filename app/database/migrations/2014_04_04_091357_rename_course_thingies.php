<?php

use Illuminate\Database\Migrations\Migration;

class RenameCourseThingies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create new course pivot table
		Schema::create('course_user', function($table)
		{
			$table->integer('course_id')
				->unsigned();
			$table->integer('user_id')
				->unsigned();
			$table->primary(array('course_id', 'user_id'));
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop table
		Schema::dropIfExists('course_user');
	}

}
