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
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('address');
            $table->string('password');
            $table->boolean('status');
            $table->integer('create_by');
            $table->integer('points')->default(0);
            $table->integer('balance')->default(0);
            $table->timestamps('last_login_at');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('branche_id');
            $table->foreign('branche_id')->references('id')->on('branches');
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