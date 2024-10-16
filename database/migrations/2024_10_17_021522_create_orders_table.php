<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('item_id');
            $table->string('booking_id');
            $table->string('order_item_quantity');
            $table->string('order_cost');
            $table->string('order_time');
            $table->enum('order_status', ['Active', 'Inactive'])->comment("Active,Inactive");
            $table->text('order_remarks')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
