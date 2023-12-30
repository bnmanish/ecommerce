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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->integer('category')->nullable();
            $table->decimal('price',10,2);
            $table->decimal('discount_price',10,2)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('other_description')->nullable();
            $table->enum('popular',['0','1'])->default('0')->comment('0=No,1=yes');
            $table->enum('new',['0','1'])->default('0')->comment('0=No,1=yes');
            $table->enum('featured',['0','1'])->default('0')->comment('0=No,1=yes');
            $table->enum('sale',['0','1'])->default('0')->comment('0=No,1=yes');
            $table->enum('in_stock',['0','1'])->default('0')->comment('0=No,1=yes');
            $table->enum('status',['0','1'])->nullable()->default('1')->comment('0=diabled,1=enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
