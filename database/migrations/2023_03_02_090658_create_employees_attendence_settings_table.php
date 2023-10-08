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
        Schema::create('employees_attendence_settings', function (Blueprint $table) {
            $table->id();
            $table->string('e_p_color')->nullable();
            $table->string('e_a_color')->nullable();
            $table->string('e_l_color')->nullable();
            $table->string('e_h_color')->nullable();
            $table->string('e_simple_color')->nullable();
            $table->string('e_sunday_color')->nullable();
            $table->string('e_holiday_color')->nullable();
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
        Schema::dropIfExists('employees_attendence_settings');
    }
};
