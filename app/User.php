<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * Para las validaciones
     */
    public static $messages = array(
       'name.required' => 'El nombre es obligatorio.',
       'name.min' => 'El nombre debe contener al menos dos caracteres.',
       'email.required' => 'El email es obligatorio.',
       'email.email' => 'El email debe contener un formato válido.',
       'email.unique' => 'El email pertenece a otro usuario.',
       'password.required' => 'La contraseña es obligatoria.',
       'level.required' => 'El nivel es obligatorio.',
       'level.numeric' => 'El nivel debe ser numérico.'
    );

    public static $rules = array(
      'name' => 'required|min:2',
      'email' => 'required|email|unique:users,email,id',
      'password' => 'required',
      'level' => 'required|numeric'
    );

    public static function validate($data, $id=null){
      $reglas = self::$rules;
      $reglas['email'] = str_replace('id', $id, self::$rules['email']);
      if($id){ unset($reglas['password']); }
      return Validator::make($data, $reglas, self::$messages);
    }
}
