<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolController extends Controller
{
    //
    public function index()
    {
        //Retornar todas las rols
        $rols = Rol::all();
        return $rols;
    }
  
    //Metodo para obtener el listado de las rols activas
    public function selectRol(Request $request)
    {
        $rols = Rol::where('estado','=','1')->select('idrol','nombre')->orderBy('nombre', 'asc')->get();
        return ['rols' => $rols];
      
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
        $rol = new Rol();
      
        //Pasar las propiedades de request al objeto recien creado
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->estado = "1";
      
        //Guardar el registro en la base de datos
        $rol->save();
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
      
        //Encontrar la rol por id
        $rol = Rol::findOrFail($request->id);
      
        //Pasar las propiedades de request al objeto recien creado
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->estado = "1";
      
        //Guardar el registro en la base de datos
        $rol->save();
    }
  
    //Funcion para desactivar la rol
    public function desactivar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la rol por id
        $rol = Rol::findOrFail($request->idrol);
        $rol->estado = "0";
      
        //Guardar el registro en la base de datos
        $rol->save();
    }
  
    //Funcion para activar la rol
    public function activar(Request $request)
    {
        //Funcion para actualizar
      
        //Encontrar la rol por id
        $rol = Rol::findOrFail($request->idrol);
        $rol->estado = "1";
      
        //Guardar el registro en la base de datos
        $rol->save();
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
