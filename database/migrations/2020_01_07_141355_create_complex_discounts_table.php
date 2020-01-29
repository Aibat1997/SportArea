<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplexDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_discounts', function (Blueprint $table) {
            $table->bigIncrements('cd_id');
            $table->integer('cd_type')->unsigned();
            $table->unsignedBigInteger('cd_complex_id');
            $table->unsignedBigInteger('cd_user_id')->nullable();
            $table->date('cd_start_date')->nullable();
            $table->date('cd_finish_date')->nullable();
            $table->time('cd_start_time')->nullable();
            $table->time('cd_finish_time')->nullable();
            $table->boolean('cd_pay_type')->default(true);
            $table->integer('cd_price')->unsigned();
            $table->string('cd_week_days')->nullable();
            $table->integer('cd_hours')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('cd_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('cd_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complex_discounts');
    }
}
