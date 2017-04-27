<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->timestamps();

            $table->foreign('parent_id')
              ->references('id')->on('rs_nodes')
              ->onDelete('cascade');

            $table->foreign('model_id')
              ->references('id')->on('rs_models')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_model_settings');
    }
}
