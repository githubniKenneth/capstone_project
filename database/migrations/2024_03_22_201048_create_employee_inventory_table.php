<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('date');
            $table->integer('emp_id');
            $table->integer('item_id');
            $table->integer('issued_qty');
            $table->integer('returned_qty')->nullable();
            $table->integer('balance_qty')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('employee_inventory');
    }
}
