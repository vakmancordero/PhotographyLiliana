<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AlbumClient;
use App\AlbumImagesClient;
use Illuminate\Support\Facades\Storage;
use File;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $usuarios = User::where('level' , 0)->orderBy('name')->paginate(20);

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
        ]);


        $user = User::find($id);

        $user->name = $request->name;
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

    public function destroy($id){
        $usuario = User::find($id);
        $galerias = AlbumClient::where('client_id', $usuario->id)->get();

        if(count($galerias) == 0){
            echo 'vacio <br>';
        }

        else {

            foreach($galerias as $gal) {
                AlbumImagesClient::where('album_clients_id', $gal->id)->delete();
                File::deleteDirectory(directories::getClientPath() . $gal->id);
                $gal->delete();
            }

        }
            
        $usuario->delete();

        return back()->with('msj', 'Usuario Eliminado');
    }
}

