<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('item_type');
            $table->string('item_name')->unique('item_name');
            $table->string('item_cost');
            $table->text('item_details');
            $table->enum('item_status', ['Active', 'Inactive'])->comment("Active,Inactive");
            $table->text('item_remarks')->nullable();
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
        Schema::dropIfExists('items');
    }
}
