<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('url')->unique();
            $table->decimal('price', 10,2)->default(0);
            $table->integer('category');
            $table->integer('subcat');
            $table->integer('avail_qty')->default(0);
            $table->string('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('product_code')->unique();
            $table->decimal('cost_price', 10,2)->default(0);
            $table->decimal('max_selling_price', 10,2)->default(0);
            $table->integer('min_stock_qty')->default(20);
            $table->integer('sequence')->nullable();
            $table->integer('status')->default(0)->comment('0=disable,1=enabled');
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
        Schema::dropIfExists('products');
    }
}
