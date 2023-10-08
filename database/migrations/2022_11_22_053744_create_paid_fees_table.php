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
        Schema::create('paid_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->string('month')->nullable();
            $table->string('pay_amount')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('campus_id')->nullable();
        
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
        Schema::dropIfExists('paid_fees');
    }
};
