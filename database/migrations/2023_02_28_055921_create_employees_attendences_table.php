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
        Schema::create('employees_attendences', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->string('attendence_value')->nullable();
            $table->date('attendence_date')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('employees_attendences');
    }
};
