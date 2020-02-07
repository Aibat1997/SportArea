<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courts', function (Blueprint $table) {
            $table->bigIncrements('c_id');
            $table->unsignedBigInteger('c_complex_id');
            $table->unsignedBigInteger('c_coverage_id');
            $table->string('c_name');
            $table->text('c_images');
            $table->boolean('c_open_field')->default(false);
            $table->integer('c_cost')->unsigned();
            $table->integer('c_prepayment')->unsigned();
            $table->boolean('c_prepayment_type')->default(true);
            $table->string('c_area');
            $table->time('c_close_start_time')->nullable();
            $table->time('c_close_end_time')->nullable();
            $table->text('c_close_info')->nullable();
            $table->boolean('c_is_closed')->default(false);
            $table->timestamps();

            $table->foreign('c_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
            $table->foreign('c_coverage_id')->references('tc_id')->on('type_coverages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courts');
    }
}
