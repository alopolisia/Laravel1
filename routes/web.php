<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas de categoria
Route::get('/categoria', 'CategoriaController@index');
Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

Route::post('/categoria/agregar', 'CategoriaController@store');

Route::put('/categoria/actualizar', 'CategoriaController@update');

Route::put('/categoria/desactivar', 'CategoriaController@desactivar');

Route::put('/categoria/activar', 'CategoriaController@activar');


//Rutas de articulos
Route::get('/articulo', 'ArticuloController@index');

Route::post('/articulo/agregar', 'ArticuloController@store');

Route::put('/articulo/actualizar', 'ArticuloController@update');

Route::put('/articulo/desactivar', 'ArticuloController@desactivar');

Route::put('/articulo/activar', 'ArticuloController@activar');

//Rutas de personas / clientes
Route::get('/cliente', 'ClienteController@index');

Route::post('/cliente/agregar', 'ClienteController@store');

Route::put('/cliente/actualizar', 'ClienteController@update');

Route::put('/cliente/borrar', 'ClienteController@borrar');

//Rutas de proveedor
Route::get('/proveedor', 'ProveedorController@index');

Route::post('/proveedor/agregar', 'ProveedorController@store');

Route::put('/proveedor/actualizar', 'ProveedorController@update');

//Rutas de rol
Route::get('/rol', 'RolController@index');
Route::put('/rol/actualizar', 'RolController@update');

Route::put('/rol/desactivar', 'RolController@desactivar');

Route::put('/rol/activar', 'RolController@activar');

//Rutas de ingreso
Route::get('/ingreso', 'IngresoController@index');

//Rutas de venta
Route::get('/venta', 'VentaController@index');
//////////////////////////////////////////////////////////////////////////////////

//Muestra la ruta de la vista welcome
Route::get('/', function () {
    return view('principal/contenido');
});

//Muestra la ruta de la vista HOLA
Route::get('/hola', function () {
    return view('hola');
});

/*Cuando un usuario hace una peticion HTTP, laravel busca en los archivos 
una definición que coincida con el patrón de la URL según el método HTTP 
usado y en la primera coincidencia le muestra el resultado al usuario
*/

Route::get('/taw', function () {
    return ('bienvenidos');
});

Route::get('/usr', function () {
    return 'Mostrando el ID del usuario: '.$_GET['id'];
});

//Debemos poner en la url http://127.0.0.1:8000/usr?id=5

//Mostrar una ruta limpia
Route::get('/usr{id}', function ($id) {
    return 'Mostrando el ID del usuario: '{$id};
})->where ('id','[0-9]+');
//Debemos poner en la url http://127.0.0.1:8000/usr/56

//Rutas con dos parametros
Route::get('/saludo{name}/{nickname}', function ($id, $nickname) {
    return 'Bienvenido: {name}, tu apodo es {nickname} ';
});
//Debemos poner en la url http://127.0.0.1:8000/mario/perro

//Ruta con nickname opcional
Route::get('/saludo2{name}/{nickname?}', function ($id, $nickname=null) {
    if($nickname){
        return 'Bienvenido: {name}, tu apodo es {nickname} ';    
    } else {
        return 'Bienvenido: {name}, tu no tienes apodo :c ';    
    }
    
});

/*
//Ruta plantilla principal
Route::get('/principal', function () {
    return view('principal/contenido');
});
*/

/*
Route::get('/', 'UserController@index');
*/
//Ruta plantilla principal con section & yield
Route::get('/usuario', function () {
    return view('principal/usuario');
});

//Ruta plantilla principal con section & yield
Route::get('/agregar_usuario', function () {
    return view('principal/agregar_usuario');
});