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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hola', function () {
    echo "HOla";
});


Route::get('/saludo/{nombre?}', function ($nombre = null) {
    if($nombre){
        return "Hola $nombre";
    }else{
        return 'Hola desconocido';
    }
});

/*
Route::get('test', function(){
    // $user = new \App\User;
    // $user->name = 'Cosme';
    // $user->email = 'cosme_fulanito@mail.com';
    // $user->password = Hash::make('1234');
    // // $user->active = true;
    // $user->save();
    // return 'Usuario insertado correctamente.';

    // $user->name = 'Fulanito';
    // $user->save();
    // return 'Registro actualizado';

    $user = \App\User::find(1);
    $user = \App\User::where('name', 'fulanito')->first();
    return $user->name;
});
*/

Route::get('test', 'TestController');
Route::get('test/usuarios', 'TestController@getUsuarios');
Route::get('test/crearusuario', 'TestController@crearUsuario');
Route::get('test/getusuario/{id}', 'TestController@getUsuario')->where('id', '[0-9]+');

// CRUD
Route::resource('users', 'UsersController');
