<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvReceivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_receivings', function (Blueprint $table) {
            $table->id();
            $table->string('rec_code');
            $table->string('rec_supplier');
            $table->date('rec_date');
            $table->string('rec_remarks')->nullable();
            $table->integer('status');
            $table->integer('is_posted');
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
        Schema::dropIfExists('inv_receivings');
    }
}
