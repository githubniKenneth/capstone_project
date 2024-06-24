<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvIssuanceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_issuance_items', function (Blueprint $table) {
            $table->id();
            $table->integer('issuance_id');
            $table->integer('item_id');
            $table->integer('uom_id');
            $table->integer('issued_qty');
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
        Schema::dropIfExists('inv_issuance_items');
    }
}
