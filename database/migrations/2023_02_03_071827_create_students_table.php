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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_id')->nullable();
            $table->string('reg_number')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('grades');
            $table->integer('roll_number')->nullable();
            $table->date('dob');
            $table->string('email', 40)->nullable();
            $table->string('province');
            $table->string('district');
            $table->string('local_area');
            $table->string('address', 130);
            $table->string('gender');
            $table->string('contact_number', 15)->nullable();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->string('fathers_name')->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('parents_contact_number', 15)->nullable();
            $table->string('parents_email')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_occupation')->nullable();
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
        Schema::dropIfExists('students');
    }
};
