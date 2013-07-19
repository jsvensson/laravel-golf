<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('events', function($table)
    {
      $table->increments('id');
      $table->integer('contest_id')
        ->unsigned();
      $table->foreign('contest_id')
        ->references('id')
        ->on('contests');
      $table->string('name');
    });

    // Create pivot table

    Schema::create('contests_events', function($table)
    {
      $table->integer('contest_id')
        ->unsigned();
      $table->foreign('contest_id')
        ->references('id')
        ->on('contests');
      $table->integer('event_id')
        ->unsigned();
      $table->foreign('event_id')
        ->references('id')
        ->on('events');
      $table->primary(array('contest_id', 'event_id'));
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('contests_events', 'events');
  }

}
