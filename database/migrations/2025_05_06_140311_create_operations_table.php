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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franchise_id');
            $table->boolean('immigration_friendly')->default(false);
            $table->boolean('veteran_incentives')->default(false);
            $table->text('day_in_the_life')->nullable();
            $table->text('territory_description')->nullable();
            $table->text('customer_base')->nullable();
            $table->text('scalability')->nullable();
            $table->text('owner_involvement')->nullable();
            $table->text('recession_strength')->nullable();
            $table->enum('b2b_or_b2c', ['B2B', 'B2C'])->nullable();
            $table->boolean('home_based')->default(false);
            $table->string('business_hours', 255)->nullable();
            $table->text('competition')->nullable();
            $table->text('history_narrative')->nullable();
            $table->text('services_income_streams')->nullable();
            $table->string('number_type_employees')->nullable();
            $table->text('real_estate_description')->nullable();
            $table->timestamps();
        
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
