<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodes', function (Blueprint $table) {
          /*  $table->integer('house_id')->default(null)->change();
            $table->integer('resource_type_id')->default(null)->change();
            $table->integer('uk_company_id')->default(null)->change();
            $table->integer('rso_company_id')->default(null)->change();
            $table->integer('teplo_model_id')->default(null)->change();
            $table->integer('teplo_model_nomer')->default(null)->change();
            $table->integer('rashodomer_pod_model_id')->default(null)->change();
            $table->integer('rashodomer_pod_model_nomer')->default(null)->change();
            $table->integer('rashodomer_obr_model_id')->default(null)->change();
            $table->integer('rashodomer_obr_model_nomer')->default(null)->change();
            $table->integer('termopar_id')->default(null)->change();
            $table->integer('termopar_nomer')->default(null)->change();
            $table->integer('davlenie_pod_id')->default(null)->change();
            $table->integer('davlenie_pod_nomer')->default(null)->change();
            $table->integer('davlenie_obr_id')->default(null)->change();
            $table->integer('davlenie_obr_nomer')->default(null)->change();
            $table->string('other')->default(null)->change();
            $table->dateTime('data')->default(null)->change();
            $table->integer('teplo_model_date')->default(null)->change();
            $table->integer('rashodomer_pod_model_date')->default(null)->change();
            $table->integer('rashodomer_obr_model_date')->default(null)->change();
            $table->integer('termopar_date')->default(null)->change();
            $table->integer('davlenie_pod_date')->default(null)->change();
            $table->integer('davlenie_obr_date')->default(null)->change();*/
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
