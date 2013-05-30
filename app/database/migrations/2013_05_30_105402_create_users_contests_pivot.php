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
      $table->foreign('contest_id')
        ->references('id')
        ->on('contests');
      $table->integer('user_id')
        ->unsigned();
      $table->foreign('user_id')
        ->references('id')
        ->on('users');
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
