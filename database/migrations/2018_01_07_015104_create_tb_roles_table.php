<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_roles', function (Blueprint $table) {
            $table->increments('roleID');
            $table->string('name')->unique();
            $table->string('role')->unique();
            $table->timestamps();
        });

        DB::table('tb_roles')->insert([
                ['name' => 'Administrator', 'role' => 'admin'],
                ['name' => 'Manager', 'role' => 'manager'],
                ['name' => 'Client', 'role' => 'client']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_roles');
    }
}
