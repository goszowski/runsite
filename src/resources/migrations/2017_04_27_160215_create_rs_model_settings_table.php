<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsModelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_model_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned();
            $table->boolean('show_in_admin_tree');
            $table->boolean('use_cache');
            $table->timestamps();

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
