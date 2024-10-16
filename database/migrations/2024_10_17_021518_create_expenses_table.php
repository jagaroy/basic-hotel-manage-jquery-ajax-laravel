<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('user_id');
            $table->string('expense_type');
            $table->text('expense_description');
            $table->string('expense_amount');
            $table->string('expense_time');
            $table->text('expense_remarks')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
