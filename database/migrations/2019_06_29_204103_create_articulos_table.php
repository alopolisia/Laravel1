<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      
        Schema::create('articulos', function (Blueprint $table) {
            //llave primaria
            $table->increments('id');
            $table->integer('idcategoria')->unsigned();
          
            $table->string('codigo',50)->nullable();
            $table->string('nombre',100);
                          
            $table->decimal('precio_venta',11,2);
            $table->integer('stock');
          
            $table->string('descripcion',250)->nullable();
        
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            $table->foreign('idcategoria')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
