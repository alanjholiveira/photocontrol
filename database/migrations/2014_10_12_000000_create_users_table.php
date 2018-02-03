<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('client');
            $table->boolean('activated')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'example@example.com',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'role' => 'admin',
                'activated' => 1,
                //'superuser' => 1
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
        Schema::dropIfExists('users');
    }
}
