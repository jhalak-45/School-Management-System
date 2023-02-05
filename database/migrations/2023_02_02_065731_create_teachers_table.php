<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('teacher_id')->nullable();
            $table->string('image')->nullable();
            $table->string('email', 30);
            $table->string('contact_number', 15);
            $table->string('academic_post');
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->longText('qualification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
