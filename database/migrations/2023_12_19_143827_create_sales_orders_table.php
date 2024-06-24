<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quotation_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('order_control_no');
            $table->string('order_number');
            $table->double('order_sub_total', 11, 2);
            $table->double('order_labor_cost', 11, 2)->nullable()->default(0);
            $table->double('order_other_cost', 11, 2)->nullable()->default(0);
            $table->double('order_discount', 11, 2)->nullable()->default(0);
            $table->double('order_total_amount', 11, 2);
            $table->integer('payment_type')->comment('1 = Cash, 2 = Online, 3 = Check');
            $table->integer('payment_status')->comment('0 = Pending, 1 = Paid, 2 = Check Pending');
            $table->date('order_date');
            $table->text('order_remarks')->nullable();
            $table->integer('order_status');
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
        Schema::dropIfExists('sales_orders');
    }
}
