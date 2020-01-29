<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('cp_court_id');
            $table->unsignedBigInteger('cp_user_id');
            $table->unsignedBigInteger('cp_payment_status_id');
            // $table->unsignedBigInteger('cp_all_boking_id');
            $table->timestamps();

            $table->foreign('cp_court_id')->references('c_id')->on('courts')->onDelete('cascade');
            $table->foreign('cp_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('cp_payment_status_id')->references('ps_id')->on('payment_statuses')->onDelete('cascade');
            // $table->foreign('cp_all_boking_id')->references('ab_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
