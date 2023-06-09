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
        Schema::create('elec_usage', function (Blueprint $table) {
            $table->bigIncrements('account_no');
            $table->string('voltage');
            $table->string('current');
            $table->string('power');
            $table->string('energy');
            $table->string('frequency');
            $table->string('pf');
            $table->date('date');
            $table->string('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elec_usage');
    }
};