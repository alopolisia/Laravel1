<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importar el modelo de Categoria
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retornar todas las categorias
        $categorias = Categoria::all();
        return $categorias;
    }
  
    //Metodo para obtener el listado de las categorias activas
    public function selectCategoria(Request $request)
    {
        $categorias = Categoria::where('condicion','=','1')->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['categorias' => $categorias];
      
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
        $categoria = new Categoria();
      
        //Pasar las propiedades de request al objeto recien creado
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = "1";
      
        //Guardar el registro en la base de datos
        $categoria->save();
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
        $categoria = Categoria::findOrFail($request->id);
      
        //Pasar las propiedades de request al objeto recien creado
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = "1";
      
        //Guardar el registro en la base de datos
        $categoria->save();
    }
  
    //Funcion para desactivar la categoria
    public function desactivar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la categoria por id
        $categoria = Categoria::findOrFail($request->id);
        $categoria->condicion = "0";
      
        //Guardar el registro en la base de datos
        $categoria->save();
    }
  
    //Funcion para activar la categoria
    public function activar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la categoria por id
        $categoria = Categoria::findOrFail($request->id);
        $categoria->condicion = "1";
      
        //Guardar el registro en la base de datos
        $categoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
