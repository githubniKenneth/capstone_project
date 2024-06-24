<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_business_name')->nullable();
            $table->string('client_first_name')->nullable();
            $table->string('client_middle_name')->nullable();
            $table->string('client_last_name')->nullable();
            $table->string('client_full_name')->nullable();
            $table->string('client_suffix')->nullable();
            $table->string('client_lot_no')->nullable();
            $table->string('client_street')->nullable();
            $table->string('client_brgy');
            $table->string('client_city');
            $table->string('client_mobile_no');
            $table->string('client_tele_no');
            $table->string('client_email');
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
        Schema::dropIfExists('clients');
    }
}
