<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_contracts', function (Blueprint $table) {
            $table->increments('contractID');
            $table->integer('clientID')->unsigned();
            $table->foreign('clientID')->references('clientID')->on('tb_clients');
            $table->string('code')->unique();
            $table->string('descrition');
            $table->text('contract');
            $table->string('filename');
            $table->text('obs');
            $table->string('status');
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
        Schema::dropIfExists('tb_contracts');
    }
}
