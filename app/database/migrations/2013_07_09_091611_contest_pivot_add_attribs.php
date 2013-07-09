<?php

use Illuminate\Database\Migrations\Migration;

class ContestPivotAddAttribs extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users_contests', function($table)
    {
     $table->boolean('is_active')
       ->default(false);
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
  public function down()
  {
    Schema::table('users_contests', function($table)
    {
      $table->dropColumn('is_active');
    });
  }

}