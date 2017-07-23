<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodes', function (Blueprint $table) {
            $table->date('teplo_model_date')->nullable()->change();

            $table->date('rashodomer_pod_model_date')->nullable()->change();

            $table->date('rashodomer_obr_model_date')->nullable()->change();

            $table->date('termopar_date')->nullable()->change();

            $table->date('davlenie_pod_date')->nullable()->change();

            $table->date('davlenie_obr_date')->nullable()->change();

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
