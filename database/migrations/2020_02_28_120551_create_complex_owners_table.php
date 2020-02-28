<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_owners', function (Blueprint $table) {
            $table->unsignedBigInteger('co_complex_id');
            $table->unsignedBigInteger('co_user_id');
            $table->timestamps();

            $table->foreign('co_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('co_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complex_owners');
    }
}
