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
        Schema::create('developer_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franchise_id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->text('corporate_address')->nullable();
            $table->timestamps();
    
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developer_contacts');
    }
};
