<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); 
            $table->string('reg_number')->unique();
            $table->string('profile')->nullable();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('programme_id'); 
            $table->string('password'); 
            $table->timestamps(); 
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
