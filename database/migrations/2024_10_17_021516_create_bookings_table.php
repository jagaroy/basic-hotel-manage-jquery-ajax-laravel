<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('room_id');
            $table->string('customer_id');
            $table->string('booking_date');
            $table->string('check_in_time');
            $table->string('check_out_time');
            $table->enum('booking_status', ['Active', 'Inactive'])->comment("Active,Inactive");
            $table->text('booking_remarks')->nullable();
            $table->integer('authored_by');
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
        Schema::dropIfExists('bookings');
    }
}
