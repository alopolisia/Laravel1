<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $primaryKey= 'idpersona';
    protected $fillable=[
        'nombre', 'tipo_documento', 'num_documento', 'direccion', 'telefono', 'email'
    ];
  
    public function proveedors()
    {
        return $this->hasMany('App\Proveedor');
    }
}
