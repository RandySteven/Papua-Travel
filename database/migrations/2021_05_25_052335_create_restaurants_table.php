<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name');
            $table->text('restaurant_address');
            $table->string('restaurant_image');
            $table->text('restaurant_description');
            $table->string('daysOpen');
            $table->string('time_open');
            $table->string('time_close');
            $table->string('slug');
            $table->enum('status', ['Open', 'Close']);
            $table->foreignId('categoryId')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('restaurants');
    }
}
