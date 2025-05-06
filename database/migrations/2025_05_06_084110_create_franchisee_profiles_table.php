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
        Schema::create('franchisee_profiles', function (Blueprint $table) {
            $table->id('profile_id');
            $table->unsignedBigInteger('franchise_id');
            $table->text('ideal_candidate_traits');
            $table->text('training_support_description');
            $table->boolean('veteran_discount');
            $table->text('available_states')->nullable();
            $table->text('store_opening_support_description')->nullable();
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchisee_profiles');
    }
};
