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
        Schema::create('pcregisters', function (Blueprint $table) {
            $table->id();
            $table->string("user_id")->unique();
            $table->string("username");
            $table->string("photo")->nullable();
            $table->text("description");
            $table->string("pc_name");
            $table->string("serial_number")->unique();
            $table->string('Register_BY');
            $table->string('barcode')->unique(); 
            $table->timestamps();

            $table->foreign('Register_BY')->references('name')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcregisters');
    }
};
