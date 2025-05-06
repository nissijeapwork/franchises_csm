<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('financials', function (Blueprint $table) {
            $table->decimal('initial_fee_one_unit', 12, 2)->nullable();
            $table->decimal('initial_fee_two_units', 12, 2)->nullable();
            $table->decimal('initial_fee_three_units', 12, 2)->nullable();
            // $table->text('capital_expenditure_items')->nullable();
            $table->decimal('referral_fee_single_unit', 12, 2)->nullable();
            $table->decimal('referral_fee_multi_unit', 12, 2)->nullable();
            $table->boolean('referral_fee_bonus')->default(false);
            $table->decimal('referral_fee_bonus_amount', 12, 2)->nullable();
            $table->decimal('resale_referral_fee_amount', 12, 2)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('financials', function (Blueprint $table) {
            $table->dropColumn([
                'initial_fee_one_unit',
                'initial_fee_two_units',
                'initial_fee_three_units',
                // 'capital_expenditure_items',
                'referral_fee_single_unit',
                'referral_fee_multi_unit',
                'referral_fee_bonus',
                'referral_fee_bonus_amount',
                'resale_referral_fee_amount',
            ]);
        });
    }
    
};
