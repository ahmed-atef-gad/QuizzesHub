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
        Schema::create('course_faculty_major_university', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('university_id');
            $table->unique(['course_id', 'faculty_id', 'major_id', 'university_id'], 'course_faculty_major_university_id');
            $table->unsignedBigInteger('degree');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_faculty_major_university');
    }
};
