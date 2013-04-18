<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('UserProfiles', function($table) {
      // FK user_id -> Users.id
      $table->integer('user_id')
        ->unsigned();
      $table->foreign('user_id')
        ->references('id')->on('Users');

      // Strings
      $table->string('first_name');
      $table->string('last_name');
      $table->string('website')->nullable();

      // Handicap
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
    Schema::dropIfExists('UserProfiles');
	}

}
