<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('ff_complex_id');
            $table->unsignedBigInteger('ff_user_id');
            $table->timestamps();

            $table->foreign('ff_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('ff_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_fields');
    }
}
