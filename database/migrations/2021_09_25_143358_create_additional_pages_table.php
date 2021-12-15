<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_title');
            $table->string('url')->nullable();
            $table->string('meta_title',500)->nullable();
            $table->string('meta_keywords',500)->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('page_content')->nullable();
            $table->string('banner')->nullable();
            $table->integer('position')->default(0)->comment('0=header,1=footer,2=both');
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
        Schema::dropIfExists('additional_pages');
    }
}
