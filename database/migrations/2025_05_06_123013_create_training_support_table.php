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
        Schema::create('training_support', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franchise_id');
            $table->text('training_support')->nullable();
            $table->text('technology_tools')->nullable();
            $table->boolean('lease_negotiation_assistance')->default(false);
            $table->boolean('staff_recruiting_assistance')->default(false);
            $table->boolean('digital_marketing_assistance')->default(false);
            $table->boolean('call_center_assistance')->default(false);
            $table->boolean('site_selection_assistance')->default(false);
            $table->timestamps();

            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_support');
    }
};
