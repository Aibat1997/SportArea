<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrancesNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrances_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('en_user_id');
            $table->unsignedBigInteger('en_complex_id');
            $table->integer('en_number_entrances')->unsigned();
            $table->timestamps();

            $table->foreign('en_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('en_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrances_numbers');
    }
}
