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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Student's name
            $table->foreignId('guardian_id')->constrained('guardians')->onDelete('cascade'); // Link to guardians
            $table->foreignId('grade_id')->constrained('grades')->onDelete('cascade'); // Link to classrooms
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade'); // Link to classrooms
            $table->string('address')->nullable();
            $table->date('date_of_birth'); // Date of birth
            $table->string('civil_id')->unique(); // Civil ID (unique identifier)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};