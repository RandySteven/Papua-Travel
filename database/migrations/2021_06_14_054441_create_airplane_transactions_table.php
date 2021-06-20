<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplaneTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airplane_id')->constrained('airplanes')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('departure_date');
            $table->string('to');
            $table->string('from');
            $table->string('schedule_time');
            $table->string('arival_time');
            $table->integer('total');
            $table->string('invoice')->unique();
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
        Schema::dropIfExists('airplane_transactions');
    }
}
