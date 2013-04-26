<?php

use Illuminate\Database\Migrations\Migration;

class CreateContestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('contests', function($table) {
      $table->increments('id');

      // Group owner, FK users.id
      $table->integer('owner_id')
        ->unsigned();
      $table->foreign('owner_id')
        ->references('id')
        ->on('users');

      // Other data
      $table->string('name');
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
		//
	}

}
