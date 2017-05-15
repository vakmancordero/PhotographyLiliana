<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::where('level' , 0)->paginate(2);

        return view('admin/usuarios/index')->with('usuarios', $usuarios);
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('admin/usuarios/edit')->with('usuario', $usuario);
    }
    public function getRegister(){
        return view('admin/register');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:100',
        ]);


        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->password)
            $user->password = bcrypt($request->password);

        $user->save();
        return redirect()->back()->with('msj', 1);

    }

    public function postRegister(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed'
        ]);

        $name = $request->name;
        $mail = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        $user = new User();

        $user->name = $name;
        $user->email = $mail;
        $user->password = bcrypt($password);

        if(isset($request->level))
            $user->level = 1;
        else
            $user->level = 0;

        $user->phone = $phone;
        $user->save();

        return redirect()->back()->with('msj', 1);

    }
}
