<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtypes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('room_type');
            $table->string('room_type_image');
            $table->string('room_type_desc');
            $table->enum('room_type_status', ['Active', 'Inactive'])->comment("Active,Inactive");
            $table->text('room_type_remarks')->nullable();
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
        Schema::dropIfExists('roomtypes');
    }
}
