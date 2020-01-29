<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_costs', function (Blueprint $table) {
            $table->bigIncrements('dc_id');
            $table->unsignedBigInteger('dc_day_week_id');
            $table->time('dc_start_time');
            $table->time('dc_end_time');
            $table->integer('dc_cost')->unsigned();
            $table->timestamps();

            $table->foreign('dc_day_week_id')->references('dw_id')->on('day_weeks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_costs');
    }
}
