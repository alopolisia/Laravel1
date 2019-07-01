<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Ingreso extends Model
{
    protected $primaryKey = 'iddetalle_ingreso';
    protected $fillable = [
        'idingreso', 'idarticulo', 'cantidad', 'precio_compra'
    ];
    public $timestamps = false;
}
