<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('class_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('shift_id')->constrained('shifts');
            $table->integer('semester');
            $table->integer('room');
            $table->string('block');
            $table->integer('floor');
            $table->string('day');
            $table->string('teacher_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('subject');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_information');
    }
};
