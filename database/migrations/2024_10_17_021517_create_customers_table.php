<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('customer_name');
            $table->string('customer_phone')->unique('customer_phone');
            $table->string('customer_email')->unique('customer_email');
            $table->text('customer_address');
            $table->enum('customer_gender', ['Male', 'Female', 'Other'])->comment("Male,Female,Other");
            $table->string('customer_photo')->nullable();
            $table->enum('customer_status', ['Active', 'Inactive'])->comment("Active,Inactive");
            $table->text('customer_remarks')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
