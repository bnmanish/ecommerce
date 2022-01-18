<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->integer('user_id');
            $table->integer('coupon_id')->nullable();
            $table->decimal('discount', 10,2)->default(0);
            $table->decimal('subtotal', 10,2)->default(0);
            $table->decimal('total', 10,2)->default(0);
            $table->date('order_date'); 
            $table->date('payment_date')->nullable();
            $table->enum('payment_status', array('Unpaid', 'Paid'))->default('Unpaid');
            $table->string('payment_method')->nullable()->comment('cash on delivery/PayUmoney/Paypal etc.');
            $table->string('payment_thrugh')->nullable()->comment('cash/PayUmoney/Paypal etc.');
            $table->string('payment_refrence_no')->nullable()->comment('cash/PayUmoney/Paypal etc.');
            $table->enum('order_status', array('Pending','Processed','Shipped','Delivered','Cancelled','Returned'))->default('Processed');
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
        Schema::dropIfExists('orders');
    }
}
