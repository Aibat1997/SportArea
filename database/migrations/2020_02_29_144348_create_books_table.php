<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('b_id');
            $table->integer('b_user_id')->unsigned();
            $table->time('b_start_datetime');
            $table->time('b_finish_datetime');
            $table->integer('b_court_id');
            $table->integer('b_court_type_id');
            $table->integer('b_payment_type_id');
            $table->integer('b_is_pay');
            $table->integer('b_cost');
            $table->integer('b_schedule_id');
            $table->string('b_comment');
            $table->integer('b_part_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
