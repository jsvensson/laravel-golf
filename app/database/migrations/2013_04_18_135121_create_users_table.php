<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('Users', function($table) {
      // id, auto-incremental (PK)
      $table->increments('id');

      // Strings
      $table->string('email', 80)
        ->unique();
      $table->string('password', 60);

      // Ints
      $table->integer('role')
        ->default(1);

      // Bools
      $table->boolean('active')
        ->default(false);

      // Timestamps
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
    Schema::dropIfExists('Users');
	}

}
