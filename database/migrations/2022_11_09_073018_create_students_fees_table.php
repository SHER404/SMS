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
        Schema::create('students_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('campus_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('fee_head_id')->nullable();
            $table->string('fee_head')->nullable();
            $table->string('actual_amount')->nullable();
            $table->string('fee_amount')->nullable();
            $table->string('fee_discount')->nullable();
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
        Schema::dropIfExists('students_fees');
    }
};
