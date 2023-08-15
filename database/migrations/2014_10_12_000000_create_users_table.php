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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('user_name')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('role',['user','admin'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->enum('email_verified',['0','1'])->default('0')->comment('0=No,1=Yes');
            $table->enum('mobile_verified',['0','1'])->default('0')->comment('0=No,1=Yes');
            $table->enum('status',['0','1'])->default('1')->comment('0=disabled,1=Enabled');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
