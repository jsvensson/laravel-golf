<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table) {
      $table->increments('id');
      $table->integer('user_id')
        ->unsigned();
      $table->string('website')
        ->nullable();
      $table->integer('handicap')
        ->default(0);

    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
