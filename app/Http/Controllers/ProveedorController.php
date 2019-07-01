<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persona;
use App\Proveedor;

class ProveedorController extends Controller
{
    //
    public function index()
    {
        //Retornar todas las personas
        $proveedors = Proveedor::join('personas','proveedors.idpersona','=','personas.idpersona')
        ->select('personas.idpersona','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','proveedors.contacto','proveedors.telefono_contacto') 
        ->get();
        return $proveedors;
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
      
        try{
          DB::beginTransaction();
          
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
          
          $proveedor = new Proveedor();

          //Pasar las propiedades de request al objeto recien creado
          $proveedor->contacto = $request->contacto;
          $proveedor->telefono_contacto = $request->telefono_contacto;
          $proveedor->idpersona = $persona->idpersona;
          
          $proveedor->save();
          
          DB::commit();
          
        } catch(Exception $e){
          DB::rollBack();
        }
      
       
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
      
        try{
          DB::beginTransaction();
          
          //Instanciar el modelo
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

          //Pasar las propiedades de request al objeto recien creado
          $proveedor = Proveedor::findOrFail($persona->idpersona);
          $proveedor->contacto = $request->contacto;
          $proveedor->telefono_contacto = $request->telefono_contacto;
          
          $proveedor->save();
          
          DB::commit();
          
        } catch(Exception $e){
          DB::rollBack();
        }
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
