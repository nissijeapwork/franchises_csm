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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id('testimonial_id');
            $table->unsignedBigInteger('franchise_id');
            $table->string('author_name');
            $table->string('location')->nullable();
            $table->text('quote');
            $table->timestamps();
    
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
