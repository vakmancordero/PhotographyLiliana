<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $password = $request->password;
        $email = $request->email;

        if (Auth::attempt(['email' => $email, 'password' => $password , 'level' => 1])) {
            // Authentication passed...
            return view('admin/home');
        }
        else if (Auth::attempt(['email' => $email, 'password' => $password , 'level' => 0])) {
            // Authentication passed...
            return 'login';
        }
    }

    public function auth() {
        return view('admin/home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function getRegister(){
        return view('admin/register');
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

        if(isset($request->level)){

            $user = new User();

            $user->name = $name;
            $user->email = $mail;
            $user->password = bcrypt($password);
            $user->level = 1;

            $user->save();

        } else {

            $user = new User();

            $user->name = $name;
            $user->email = $mail;
            $user->password = bcrypt($password);
            $user->level = 0;

            $user->save();

        }

        return redirect()->back()->with('msj', 1);

    }

}