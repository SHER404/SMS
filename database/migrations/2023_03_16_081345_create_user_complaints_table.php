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
        Schema::create('user_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->nullable();
            $table->string('complainant_name')->nullable();
            $table->string('complainant_whatsapp_number')->nullable();
            $table->string('class_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('category')->nullable();
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->integer('campus_id')->nullable();
            $table->integer('tracking_id')->nullable();
            
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
        Schema::dropIfExists('user_complaints');
    }
};
