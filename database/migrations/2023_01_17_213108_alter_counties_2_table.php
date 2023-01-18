<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCounties2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('counties', function(Blueprint $table)
        {
            $table->dropColumn('county_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('counties', function(Blueprint $table)
        {
            $table->integer('county_id')->unsigned()->nullable()->index();

        });
    }
}
