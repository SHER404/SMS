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
        Schema::table('campuses', function (Blueprint $table) {
            $table->string('campus_code')->nullable();
            $table->string('campus_bank_detail')->nullable();
            $table->string('campus_whattsapp')->nullable();
            $table->string('active_session')->nullable();
            $table->string('campus_status')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symble')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campuses', function (Blueprint $table) {
            //
        });
    }
};
