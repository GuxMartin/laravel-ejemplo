<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
  public function __invoke(){
     return 'Bienvenido a nuestro primer controlador';
  }// /__invoke

  public function crearUsuario(){
    $user = new \App\User;
    $user->name = 'Gux';
    $user->email = 'gux@mail.com';
    $user->password = Hash::make('123456');
    // $user->active = true;
    $user->save();
    return 'Usuario insertado correctamente.';
  }

  public function getUsuarios(){
     $users = \App\User::all();
     //return view('test.usuarios')->with('users', $users);
     return view('test.usuarios', ["users"=>$users]);
  }// /getUsuarios

  public function getUsuario(int $id){
     if(! $user = \App\User::find($id)){ return "Usuario no encontrado"; }
     return "{$user->name} / {$user->email}";
  }
}
