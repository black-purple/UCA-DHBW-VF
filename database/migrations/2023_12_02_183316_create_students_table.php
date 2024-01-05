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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nationnality');
            $table->string('university');
            $table->string('email_student');
            $table->date('date_birth');
            $table->string('phone_number');
            $table->string('photo')->nullable();
            $table->bigInteger('exchanges_id')->unsigned()->nullable();
            $table->bigInteger('internship_id')->unsigned()->nullable();
            $table->foreign('exchanges_id')->references('id')->on('exchanges')->onDelete('set null');
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('set null');
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
