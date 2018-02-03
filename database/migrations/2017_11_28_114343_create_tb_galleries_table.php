<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_galleries', function (Blueprint $table) {
            $table->increments('photoID');
            $table->integer('clientID')->unsigned();
            $table->foreign('clientID')->references('clientID')->on('tb_clients');
            $table->string('title');
            $table->string('path');
            $table->text('obs');
            $table->string('status', 20)->default('unpublished');
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
        Schema::dropIfExists('tb_galleries');
    }
}
