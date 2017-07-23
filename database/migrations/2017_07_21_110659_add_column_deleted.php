<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDeleted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_types', function (Blueprint $table) {
            $table->integer('deleted')->default(0);
        });

        Schema::table('y_companies', function (Blueprint $table) {
            $table->integer('deleted')->default(0);
        });

        Schema::table('komplekt_termopars', function (Blueprint $table) {
            $table->integer('deleted')->default(0);
        });

        Schema::table('r_s_o_companies', function (Blueprint $table) {
            $table->integer('deleted')->default(0);
        });

        Schema::table('davlenie_na_podaches', function (Blueprint $table) {
            $table->integer('deleted')->default(0);
        });

        Schema::table('davlenie_na_obrabotkes', function (Blueprint $table) {
            $table->integer('deleted')->default(0);
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
