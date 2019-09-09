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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('test', function(){
   // //Registro 1
   // $post1 = new \App\Post();
   // $post1->title = 'Título 1';
   // $post1->body = 'Contenido 1';
   // $post1->user_id = 1;
   // $post1->save();
   // //Registro 1
   // $post2 = new \App\Post();
   // $post2->title = 'Título 2';
   // $post2->body = 'Contenido 2';
   // $post2->user_id = 1;
   // $post2->save();
   // //Registro 1
   // $post3 = new \App\Post();
   // $post3->title = 'Título 3';
   // $post3->body = 'Contenido 3';
   // $post3->user_id = 1;
   // $post3->save();
   
   $user = \App\User::find(1);
   $posts = $user->posts;
   $lista = '<ul>';
   foreach($posts as $item){
      $lista .= '<li>';
      $lista .= '<h2> ' . $item['title'] . ' </h2>';
      $lista .= '<div> ' . $item['body'] . ' </div>';
      $lista .= '</li>';
   }
   $lista .= '</ul>';
   return $lista;
});
