<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvReceivingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_receiving_details', function (Blueprint $table) {
            $table->id();
            $table->integer('rec_id');
            $table->integer('item_id');
            $table->integer('uom_id');
            $table->integer('rec_qty');
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
        Schema::dropIfExists('inv_receiving_details');
    }
}
