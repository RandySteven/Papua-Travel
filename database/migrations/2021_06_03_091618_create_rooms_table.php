<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->integer('floor');
            $table->integer('room_price_pernight');
            $table->enum('beds', ['Double Bed', 'King Bed', 'Single Bed', 'Extra Bed']);
            $table->string('room_image');
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->enum('status', ['Aviable', 'Booked']);
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
        Schema::dropIfExists('rooms');
    }
}
