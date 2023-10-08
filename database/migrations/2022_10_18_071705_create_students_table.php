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
            $table->string('img')->nullable();
            $table->string('Registration_id')->nullable();
            $table->string('Registration_date')->nullable();
            $table->string('student_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('cast')->nullable();
            $table->string('dob')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('town')->nullable();
            $table->string('level_admision')->nullable();
            $table->string('level_study')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('father_occup')->nullable();
            $table->string('home_distance')->nullable();
            $table->integer('family_id')->nullable();
            $table->string('student_status')->nullable();
            $table->string('family_name')->nullable();
            $table->string('schedule')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('reffered_by')->nullable();
            $table->string('name')->nullable();
            $table->integer('campus_id')->nullable();
            $table->string('online_team')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('academic_session_id')->nullable();
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
