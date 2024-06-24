<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->integer('empr_id');
            $table->string('emp_first_name');
            $table->string('emp_middle_name')->nullable();
            $table->string('emp_last_name');
            $table->string('emp_full_name');
            $table->string('emp_suffix')->nullable();
            $table->string('emp_lot_no')->nullable();
            $table->string('emp_street');
            $table->string('emp_brgy');
            $table->string('emp_city');
            $table->string('emp_full_address');
            $table->string('emp_tele_no')->nullable();
            $table->string('emp_phone_no');
            $table->string('emp_email');
            $table->integer('status');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('employees');
    }
}
