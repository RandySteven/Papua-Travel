<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplanes', function (Blueprint $table) {
            $table->id();
            $table->string('airplane_name');
            $table->string('airplane_image');
            $table->string('slug');
            $table->text('airplane_description');
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
        Schema::dropIfExists('airplanes');
    }
}
