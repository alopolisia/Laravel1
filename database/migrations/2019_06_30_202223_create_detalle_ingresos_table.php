<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
           $table->increments('iddetalle_ingreso');
           $table->integer('idingreso')->unsigned();
           $table->integer('idarticulo')->unsigned(); 
           $table->integer('cantidad');
           $table->decimal('precio_compra', 11, 2);	
           $table->timestamps();
           $table->foreign('idingreso')->references('idingreso')->on('ingresos')->onDelete('cascade');
           $table->foreign('idarticulo')->references('id')->on('articulos')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingresos');
    }
}
