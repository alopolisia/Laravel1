<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class ClienteController extends Controller
{
    //
    public function index()
    {
        //Retornar todas las personas
        $personas = Persona::all();
        return $personas;
    }
  
    //Metodo para obtener el listado de las personas activas
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
        $persona = new Persona();
      
        //Pasar las propiedades de request al objeto recien creado
        $persona->nombre = $request->nombre;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento = $request->num_documento;
        $persona->direccion = $request->direccion; 
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
      
        //Guardar el registro en la base de datos
        $persona->save();
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
        $persona = Persona::findOrFail($request->idpersona);
      
        //Pasar las propiedades de request al objeto recien creado
        $persona->nombre = $request->nombre;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento = $request->num_documento;
        $persona->direccion = $request->direccion; 
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
      
        //Guardar el registro en la base de datos
        $persona->save();
    }
  
    //Funcion para desactivar la categoria
    public function borrar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la categoria por id
        $persona = Persona::findOrFail($request->idpersona);
      
        //Guardar el registro en la base de datos
        $persona->delete();
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
