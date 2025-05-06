<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('training_support', function (Blueprint $table) {
            $table->boolean('health_insurance_programs')->default(false)->after('site_selection_assistance');
            $table->boolean('financing_provided')->default(false)->after('health_insurance_programs');
        });
    }

    public function down()
    {
        Schema::table('training_support', function (Blueprint $table) {
            $table->dropColumn(['health_insurance_programs', 'financing_provided']);
        });
    }

};
