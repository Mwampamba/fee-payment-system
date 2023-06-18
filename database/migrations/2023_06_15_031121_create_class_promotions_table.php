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
        Schema::create('class_promotions', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreignId('programme_id')->references('id')->on('programmes')->onDelete('cascade'); 
            $table->foreignId('to_class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreignId('to_programme_id')->references('id')->on('programmes')->onDelete('cascade');
            $table->string('academic_year_id')->references('id')->on('academic_years')->onDelete('cascade');
            $table->string('new_academic_year_id')->references('id')->on('academic_years')->onDelete('cascade');
            $table->timestamps();  
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_promotions');
    }
};
