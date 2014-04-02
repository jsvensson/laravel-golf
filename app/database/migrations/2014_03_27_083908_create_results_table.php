<?php

use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
  {
    Schema::create('results', function($table) {
      $table->increments('id');
      $table->integer('user_id')
        ->unsigned();
      $table->integer('contest_id')
        ->unsigned();
      $table->integer('event_id')
        ->unsigned();
      $table->integer('score')
        ->default(0);
      $table->float('handicap')
        ->default(0);
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
    Schema::drop('results');
	}

}
