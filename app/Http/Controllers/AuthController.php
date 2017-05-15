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

}
