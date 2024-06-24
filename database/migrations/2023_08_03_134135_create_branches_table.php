<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('branch_lot_no')->nullable();
            $table->string('branch_street')->nullable();
            $table->string('branch_brgy');
            $table->string('branch_city');
            $table->string('full_address');
            $table->string('branch_tele_no')->nullable();
            $table->string('branch_phone_no')->nullable();
            $table->string('branch_email')->nullable();
            $table->integer('branch_status');
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
        Schema::dropIfExists('branches');
    }
}
