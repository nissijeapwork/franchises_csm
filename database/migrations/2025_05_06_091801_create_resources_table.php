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
        Schema::create('resources', function (Blueprint $table) {
            $table->id('resource_id');
            $table->unsignedBigInteger('franchise_id');
            $table->string('fdd_pdf_url')->nullable();
            $table->text('franchise_comparisons')->nullable();
            $table->timestamps();

            $table->foreign('franchise_id')
                  ->references('franchise_id')
                  ->on('franchises')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
