<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbClientTelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_client_tels', function (Blueprint $table) {
            $table->increments('clientTelID');
            $table->integer('clientID')->unsigned();
            $table->foreign('clientID')->references('clientID')->on('tb_clients');
            $table->string('number');
            $table->string('type');
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
        Schema::dropIfExists('tb_client_tels');
    }
}
