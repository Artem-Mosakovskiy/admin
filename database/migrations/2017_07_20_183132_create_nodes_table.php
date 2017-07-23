<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->nullable();
            $table->integer('resource_type_id')->nullable();
            $table->integer('uk_company_id')->nullable();
            $table->integer('rso_company_id')->nullable();

            $table->integer('teplo_model_id')->nullable();
            $table->integer('teplo_model_nomer')->nullable();

            $table->integer('rashodomer_pod_model_id')->nullable();
            $table->integer('rashodomer_pod_model_nomer')->nullable();

            $table->integer('rashodomer_obr_model_id')->nullable();
            $table->integer('rashodomer_obr_model_nomer')->nullable();

            $table->integer('termopar_id')->nullable();
            $table->integer('termopar_nomer')->nullable();

            $table->integer('davlenie_pod_id')->nullable();
            $table->integer('davlenie_pod_nomer')->nullable();

            $table->integer('davlenie_obr_id')->nullable();
            $table->integer('davlenie_obr_nomer')->nullable();

            $table->string('other')->nullable();

            $table->dateTime('data')->nullable();

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
        Schema::dropIfExists('nodes');
    }
}
