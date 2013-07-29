<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersContestsPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_contests', function($table)
    {
      $table->integer('contest_id')
        ->unsigned();
      $table->integer('user_id')
        ->unsigned();
      $table->primary(array('user_id', 'contest_id'));
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_contests');
	}

}
