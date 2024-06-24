<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_quotations', function (Blueprint $table) {
            $table->id();
            $table->string('is_request');
            $table->string('brand_id')->nullable();
            $table->string('installation_type')->nullable();
            $table->string('resolution_id')->nullable();
            $table->integer('channel_id')->nullable();
            $table->integer('indoor_cam_no')->nullable();
            $table->integer('outdoor_cam_no')->nullable();
            $table->string('quote_date');
            $table->string('quote_name');
            $table->string('quote_email');
            $table->string('quote_contact_no');
            $table->string('quote_address');
            $table->string('remarks');
            $table->integer('status');
            $table->integer('is_posted');
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
        Schema::dropIfExists('sales_quotations');
    }
}
