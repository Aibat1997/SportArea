<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportComplexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_complexes', function (Blueprint $table) {
            $table->bigIncrements('sc_id');
            $table->unsignedBigInteger('sc_city_id');
            $table->unsignedBigInteger('sc_sport_type_id');
            $table->unsignedBigInteger('sc_creater_id');
            $table->string('sc_name');
            $table->text('sc_addres');
            $table->text('sc_map')->nullable();
            $table->string('sc_work_time_weekday');
            $table->string('sc_work_time_weekend');
            $table->string('sc_phone')->nullable();
            $table->boolean('sc_show_phone')->default(true);
            $table->text('sc_description');
            $table->boolean('sc_accept_applications')->default(false);
            $table->boolean('sc_is_closed')->default(false);
            $table->string('sc_image');
            $table->double('sc_raiting')->default(0.0);
            $table->timestamps();
            
            $table->foreign('sc_city_id')->references('city_id')->on('cities');
            $table->foreign('sc_sport_type_id')->references('st_id')->on('sport_types');
            $table->foreign('sc_creater_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_complexes');
    }
}
