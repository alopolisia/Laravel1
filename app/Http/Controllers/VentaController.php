<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;
use App\Venta;
use App\User;

class VentaController extends Controller
{
    public function index(Request $request)
    {
                
        $ventas = Venta::join('personas','ventas.idcliente','=','personas.idpersona')
            ->join('usuarios','ventas.idusuario','=','usuarios.idpersona')
            ->select('ventas.idventa','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total_venta',
            'ventas.estado','personas.nombre','usuarios.usuario')->get();
         
        return $ventas;
    }
}
