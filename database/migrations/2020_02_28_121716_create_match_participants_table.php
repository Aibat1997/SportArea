<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('mp_match_id');
            $table->unsignedBigInteger('mp_user_id');
            $table->timestamps();
            
            $table->foreign('mp_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('mp_match_id')->references('m_id')->on('matches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_participants');
    }
}
