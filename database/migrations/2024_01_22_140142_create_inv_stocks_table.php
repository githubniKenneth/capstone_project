<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->integer('issued_qty');
            $table->integer('returned_qty');
            $table->integer('sold_qty');
            $table->integer('adjusted_qty');
            $table->integer('balance_qty');
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
        Schema::dropIfExists('inv_stocks');
    }
}
