<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('program_name')->nullable();
            $table->string('season')->nullable();
            $table->string('season_start')->nullable();
            $table->string('season_end')->nullable();
            $table->string('farm_type_criteria')->nullable();
            $table->string('farm_produce_criteria')->nullable();
            $table->string('county_boundary_criteria')->nullable();
            $table->string('ward_boundary_criteria')->nullable();
            $table->string('maximum_farmers')->nullable();
            $table->string('disbursed_amount')->nullable();
            $table->string('deposited_amount')->nullable();
            $table->string('status')->nullable();
            $table->string('organization')->nullable();
            $table->text('organization_logo')->nullable();
            $table->string('bank_account')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('programs');
    }
}
