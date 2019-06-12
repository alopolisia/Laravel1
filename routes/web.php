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

//Muestra la ruta de la vista welcome
Route::get('/', function () {
    return view('welcome');
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


//Ruta plantilla principal
Route::get('/principal', function () {
    return view('principal/');
});

//Ruta plantilla principal con section & yield
Route::get('/principal2', function () {
    return view('principal/contenido');
});


//Ruta plantilla principal con section & yield
Route::get('/usuario', function () {
    return view('principal/usuario');
});

//Ruta plantilla principal con section & yield
Route::get('/agregar_usuario', function () {
    return view('principal/agregar_usuario');
});