<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned();
            $table->integer('type_id');
            $table->string('name');
            $table->string('display_name');
            $table->string('hint');
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
        Schema::dropIfExists('rs_fields');
    }
}
