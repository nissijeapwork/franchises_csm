<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->text('business_model')->nullable()->after('youtube_channel');
            $table->boolean('investor_executive_model')->default(false)->after('business_model');
            $table->boolean('sub_contractor_model')->default(false)->after('investor_executive_model');
            $table->boolean('keep_my_job')->default(false)->after('sub_contractor_model');
        });
    }

    public function down()
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn([
                'business_model',
                'investor_executive_model',
                'sub_contractor_model',
                'keep_my_job'
            ]);
        });
    }
};
