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
        Schema::create('invoice_heads', function (Blueprint $table) {
            $table->id();
            
            $table->integer('invoice_id')->nullable();
            $table->integer('head_id')->nullable();
            $table->string('head_amount')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('discount_amount')->nullable();
            $table->integer('session_id')->nullable();
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
        Schema::dropIfExists('invoice_heads');
    }
};
