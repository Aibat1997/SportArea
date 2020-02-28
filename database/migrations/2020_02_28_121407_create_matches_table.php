<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('m_id');
            $table->unsignedBigInteger('m_owner_id');
            $table->unsignedBigInteger('m_court_id');
            $table->integer('m_format')->unsigned();
            $table->integer('m_participant_count')->unsigned();
            $table->date('m_date');
            $table->time('m_start_time');
            $table->time('m_finish_time');
            $table->timestamps();

            $table->foreign('m_owner_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('m_court_id')->references('c_id')->on('courts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
