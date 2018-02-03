<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_clients', function (Blueprint $table) {
            $table->increments('clientID');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('companyname')->nullable();
            $table->string('email');
            $table->string('phonenumber');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('postcode')->nullable();
            $table->string('password');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('tb_clients');
    }
}
