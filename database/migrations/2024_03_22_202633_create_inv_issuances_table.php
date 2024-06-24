<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvIssuancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_issuances', function (Blueprint $table) {
            $table->id();
            $table->date('issuance_date');
            $table->string('issuance_number');
            $table->string('issuance_control_no');
            $table->integer('issued_by');
            $table->integer('received_by');
            $table->text('remarks')->nullable();
            $table->integer('is_posted');
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
        Schema::dropIfExists('inv_issuances');
    }
}
