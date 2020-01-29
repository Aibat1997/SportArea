<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_weeks', function (Blueprint $table) {
            $table->bigIncrements('dw_id');
            $table->unsignedBigInteger('dw_court_id');
            $table->integer('dw_day_week')->unsigned();
            $table->boolean('dw_status')->default(false);
            $table->timestamps();

            $table->foreign('dw_court_id')->references('c_id')->on('courts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_weeks');
    }
}
