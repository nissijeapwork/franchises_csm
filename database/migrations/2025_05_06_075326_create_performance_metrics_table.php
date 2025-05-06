<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('performance_metrics', function (Blueprint $table) {
            $table->id('metric_id');
            $table->unsignedBigInteger('franchise_id');
            $table->integer('number_of_units');
            $table->integer('new_units_opened_last_year');
            $table->decimal('growth_score', 5, 2)->nullable();
            $table->decimal('turnover_score', 5, 2)->nullable();
            $table->text('unit_trend_chart_data')->nullable();
            $table->timestamps();

            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performance_metrics');
    }
};

