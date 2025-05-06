<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->string('featured_image')->nullable();
            $table->text('significant_capital_expenditure_items')->nullable();
            $table->text('franchise_agreement_term')->nullable();
            $table->string('youtube_channel')->nullable();
        });
    }

    public function down()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn([
                'featured_image',
                'significant_capital_expenditure_items',
                'franchise_agreement_term',
                'youtube_channel'
            ]);
        });
    }

};
