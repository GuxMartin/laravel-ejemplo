<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('users.index', ["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = new User();
      return view('users.save')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('password'));
      $user->level = $request->input('level');
      $user->active = true;

      $validator = User::validate([
        'name' => $user->name,
        'email' => $user->email,
        'password' => $request->input('password'),
        'level' => $user->level,
      ]);

      if($validator->fails()){
        $errors = $validator->messages();
        $user->password = null;
        // return redirect('users/create')->with('user', $user)->with('errors', $errors);
        return view('users.save')->with('user', $user)->with('errors', $errors);
        // return redirect()->back()->with('errors', $errors);
      }else{
        $user->save();
        return redirect('users')->with('notice', 'El usuario ha sido creado correctamente.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);
      return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      return view('users.save')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->level = $request->input('level');

      $validator = User::validate([
        'name' => $user->name,
        'email' => $user->email,
        'level' => $user->level,
      ], $user->id);
// return $user;
      if($validator->fails()){
         $errors = $validator->messages();
         return view('users.save')->with('user', $user)->with('errors', $errors);
      }else{
         $user->save();
         return redirect('users')->with('notice', 'El usuario ha sido modificado correctamente.');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect('users')->with('notice', 'El usuario ha sido eliminado correctamente.');
    }
}
