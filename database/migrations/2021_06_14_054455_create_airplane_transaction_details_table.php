<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirplaneTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_transaction_details', function (Blueprint $table) {
            $table->foreignId('seat_id')->constrained('seats')->onDelete('cascade');
            $table->foreignId('airplane_t_id')->constrained('airplane_transactions')->onDelete('cascade');
            $table->primary(['seat_id', 'airplane_t_id']);
            $table->string('passenger_name');
            $table->integer('passenger_age');
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
        Schema::dropIfExists('airplane_transaction_details');
    }
}
