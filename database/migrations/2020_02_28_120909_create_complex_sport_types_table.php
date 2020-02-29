<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexSportTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_sport_types', function (Blueprint $table) {
            $table->unsignedBigInteger('cst_complex_id');
            $table->unsignedBigInteger('cst_sport_type_id');
            $table->timestamps();

            $table->foreign('cst_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('cst_sport_type_id')->references('st_id')->on('sport_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complex_sport_types');
    }
}
