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
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('role_id')->default(2);
                $table->integer('type_id')->nullable()->default(null);
                $table->string('login')->unique();
                $table->string('f_name');
                $table->string('s_name');
                $table->string('t_name');
                $table->string('email')->unique()->nullable(true)->default(null);
                $table->string('password');
                $table->integer('deleted')->default(0);
                $table->rememberToken();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('roles')){
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('role');
            });
        }

        if(!Schema::hasTable('types')){
            Schema::create('types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('type');
            });
        }

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
