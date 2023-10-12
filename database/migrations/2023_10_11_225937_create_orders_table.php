<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('coupon_code')->nullable();
            $table->decimal('discount',10,2)->default(0);
            $table->decimal('shipping_charges',10,2)->default(0);
            $table->decimal('taxes',10,2)->default(0);
            $table->decimal('sub_total',10,2)->default(0);
            $table->decimal('grand_total',10,2)->default(0);
            $table->string('payment_ref_no')->default(0);
            $table->enum('mode',['1','2'])->default('1')->comment('1=COD,2=PayUMoney');
            $table->enum('status',['1','2'])->default('1')->comment('1=Unpaid,2=Paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
