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
        Schema::create('franchises', function (Blueprint $table) {
            $table->id('franchise_id');
            $table->string('franchise_name');
            $table->string('slug_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('tagline')->nullable();

            // Industry as a foreign key
            $table->unsignedBigInteger('industry_id')->default(1); // default to Automotive (ID=1)
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('restrict');

            $table->year('founded_year')->nullable();
            $table->year('franchising_since')->nullable();
            $table->string('hq_location')->nullable();
            $table->string('ceo_name')->nullable();
            $table->text('description_long')->nullable();
            $table->string('website_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchises');
    }
};
