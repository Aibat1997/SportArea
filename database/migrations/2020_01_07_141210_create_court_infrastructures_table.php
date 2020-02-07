<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_infrastructures', function (Blueprint $table) {
            $table->unsignedBigInteger('ci_court_id');
            $table->unsignedBigInteger('ci_infrasructure_id');

            $table->foreign('ci_court_id')->references('c_id')->on('courts')->onDelete('cascade');
            $table->foreign('ci_infrasructure_id')->references('inf_id')->on('infrastructures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('court_infrastructures');
    }
}
