<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('r_complex_id');
            $table->unsignedBigInteger('r_user_id');
            $table->text('r_text');
            $table->double('r_raiting')->unsigned();
            $table->timestamps();

            $table->foreign('r_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('r_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
