<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodes', function (Blueprint $table) {
            $table->integer('teplo_model_date')->nullable();

            $table->integer('rashodomer_pod_model_date')->nullable();

            $table->integer('rashodomer_obr_model_date')->nullable();

            $table->integer('termopar_date')->nullable();

            $table->integer('davlenie_pod_date')->nullable();

            $table->integer('davlenie_obr_date')->nullable();

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
