<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterWards1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wards', function(Blueprint $table)
        {
            $table->dropColumn('ward_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wards', function(Blueprint $table)
        {
            $table->integer('ward_id')->unsigned()->nullable()->index();

        });
    }
}
