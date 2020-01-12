<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proposiciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposiciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identificacion');
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->string('ejes');
            $table->string('problema');
            $table->string('solucion');
            $table->string('video');
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
        //
    }
}
