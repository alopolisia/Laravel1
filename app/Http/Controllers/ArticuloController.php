<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class ArticuloController extends Controller
{
    //
    public function index()
    {
        //Retornar todas los articulos
        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion') 
        ->get();
        return $articulos;
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funcion para guardar, basicamente es el Insert :v
      
        //Instanciar el modelo
        $articulo = new Articulo();
      
        //Pasar las propiedades de request al objeto recien creado
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = "1";
      
        //Guardar el registro en la base de datos
        $articulo->save();
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la categoria por id
        $articulo = Articulo::findOrFail($request->id);
      
        //Pasar las propiedades de request al objeto recien creado
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = "1";
      
        //Guardar el registro en la base de datos
        $articulo->save();
    }
  
    //Funcion para desactivar la categoria
    public function desactivar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la categoria por id
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = "0";
      
        //Guardar el registro en la base de datos
        $articulo->save();
    }
  
    //Funcion para activar la categoria
    public function activar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la categoria por id
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = "1";
      
        //Guardar el registro en la base de datos
        $articulo->save();
    }
}
