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
            $table->string('identificacion', 20)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('ejes', 100)->nullable();
            $table->string('problema', 1000)->nullable();
            $table->string('solucion', 1000)->nullable();
            $table->string('video', 100)->nullable();
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
