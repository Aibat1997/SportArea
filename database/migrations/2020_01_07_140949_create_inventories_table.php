<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('inv_id');
            $table->unsignedBigInteger('inv_complex_id');
            $table->string('inv_name')->nullable();
            $table->integer('inv_cost')->unsigned();
            $table->boolean('inv_is_active')->default(false);
            $table->timestamps();

            $table->foreign('inv_complex_id')->references('sc_id')->on('sport_complexes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
