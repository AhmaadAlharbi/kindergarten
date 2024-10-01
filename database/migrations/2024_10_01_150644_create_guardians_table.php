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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            // Father information
            $table->string('father_name');
            $table->string('father_phone')->nullable();
            $table->string('father_email')->unique();
            $table->string('father_civil_id')->unique();
            $table->string('father_address')->nullable();
            $table->string('father_job')->nullable();
            // Mother information
            $table->string('mother_name');
            $table->string('mother_phone')->nullable();
            $table->string('mother_email')->unique();
            $table->string('mother_civil_id')->unique();
            $table->string('mother_address')->nullable();
            $table->string('mother_job')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};