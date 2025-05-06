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
        Schema::create('financials', function (Blueprint $table) {
            $table->id('financial_id');
            $table->unsignedBigInteger('franchise_id');
            $table->decimal('cash_required', 12, 2);
            $table->decimal('net_worth_required', 12, 2);
            $table->decimal('total_investment_low', 12, 2);
            $table->decimal('total_investment_high', 12, 2);
            $table->decimal('franchise_fee', 12, 2);
            $table->decimal('royalty_fee', 5, 2);
            $table->decimal('ad_fund_fee', 5, 2);
            $table->decimal('average_unit_volume', 12, 2);
            $table->decimal('affiliate_revenue', 12, 2)->nullable(); // Optional
            $table->timestamps();
        
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financials');
    }
};
