<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('national_id')->unique();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('gender', 10);
            $table->string('dob');
            $table->string('email', 100);
            $table->string('phone')->unique();
            $table->string('county', 100);
            $table->string('ward', 100);
            $table->string('village', 100);
            $table->string('status', 100);
            $table->string('farm_type', 100);
            $table->text('produce');
            $table->string('farm_house', 100);
            $table->string('terms', 100);
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
        Schema::dropIfExists('farmers');
    }
};
