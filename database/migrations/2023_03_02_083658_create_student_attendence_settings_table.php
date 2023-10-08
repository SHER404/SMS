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
        Schema::create('student_attendence_settings', function (Blueprint $table) {
            $table->id();
            $table->string('p_color')->nullable();
            $table->string('a_color')->nullable();
            $table->string('l_color')->nullable();
            $table->string('h_color')->nullable();
            $table->string('simple_color')->nullable();
            $table->string('sunday_color')->nullable();
            $table->string('holiday_color')->nullable();
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
        Schema::dropIfExists('student_attendence_settings');
    }
};
