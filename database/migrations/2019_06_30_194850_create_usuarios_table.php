<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
  
          $table->integer('idpersona')->unsigned();
          $table->integer('idrol')->unsigned();
          $table->string('clave',64);
          $table->boolean('condicion')->default(1);
          $table->timestamps();
          $table->foreign('idpersona')->references('idpersona')->on('personas')->onDelete('cascade');
          $table->foreign('idrol')->references('idrol')->on('rols')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
