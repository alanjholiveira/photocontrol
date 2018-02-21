<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTablesRelated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_templates', function ($table) {
            $table->softDeletes();
        });

        Schema::table('tb_clients', function ($table) {
            $table->softDeletes();
        });

        Schema::table('tb_contracts', function ($table) {
            $table->softDeletes();
        });

        Schema::table('users', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
