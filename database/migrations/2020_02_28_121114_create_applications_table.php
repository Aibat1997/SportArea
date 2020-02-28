<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('app_id');
            $table->unsignedBigInteger('app_user_id');
            $table->unsignedBigInteger('app_court_id');
            $table->time('app_start_time');
            $table->time('app_finish_time');
            $table->boolean('app_status')->default(false);
            $table->timestamps();

            $table->foreign('app_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('app_court_id')->references('c_id')->on('courts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
