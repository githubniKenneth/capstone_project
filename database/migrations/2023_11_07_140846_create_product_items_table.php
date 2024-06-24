<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->integer('item_type');
            $table->integer('uom_id');
            $table->integer('brand_id');
            $table->integer('category_id')->nullable();
            $table->integer('series_id')->nullable();
            $table->integer('resolution_id')->nullable();
            $table->string('camera_specs')->nullable();
            $table->string('product_name');
            $table->string('product_desc')->nullable();
            $table->double('product_price');
            $table->string('remarks')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');

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
        Schema::dropIfExists('product_items');
    }
}
