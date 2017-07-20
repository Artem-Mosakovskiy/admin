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
            $table->integer('house_id');
            $table->integer('resource_type_id');
            $table->integer('uk_company_id');
            $table->integer('rso_company_id');

            $table->integer('teplo_model_id');
            $table->integer('teplo_model_nomer');

            $table->integer('rashodomer_pod_model_id');
            $table->integer('rashodomer_pod_model_nomer');

            $table->integer('rashodomer_obr_model_id');
            $table->integer('rashodomer_obr_model_nomer');

            $table->integer('termopar_id');
            $table->integer('termopar_nomer');

            $table->integer('davlenie_pod_id');
            $table->integer('davlenie_pod_nomer');

            $table->integer('davlenie_obr_id');
            $table->integer('davlenie_obr_nomer');

            $table->string('other');

            $table->dateTime('data');

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
