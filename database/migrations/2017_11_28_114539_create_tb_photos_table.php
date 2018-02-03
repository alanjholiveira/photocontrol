<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPhotoFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_photos', function (Blueprint $table) {
            $table->increments('photoID');
            $table->integer('galleryID')->unsigned();
            $table->foreign('galleryID')->references('galleryID')->on('tb_galleries');
            $table->string('filename');
            $table->string('extension');
            $table->string('mime');
            $table->boolean('confirmation');
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
        Schema::dropIfExists('tb_photos');
    }
}
