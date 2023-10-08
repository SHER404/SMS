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
        Schema::create('student_attendence_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('attendence_value')->nullable();
            $table->date('attendence_date')->nullable();
            $table->string('msg')->nullable();
            $table->integer('campus_id')->nullable();
            $table->integer('session_id')->nullable();
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
        Schema::dropIfExists('st_attendence_histories');
    }
};
