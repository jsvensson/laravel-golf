<?php

use Illuminate\Database\Migrations\Migration;

class UpdateContestsAddStartDateEndDate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contests', function($table)
    {
      $table->date('start_date');
      $table->date('end_date')
        ->nullable();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('contests', function($table)
    {
      $table->dropColumn('start_date', 'end_date');
    });
	}

}
