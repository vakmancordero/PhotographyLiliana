<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlbumClient;
use App\AlbumImagesClient;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClientController extends Controller
{


    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return response()->json('holi');
        
        $credentials = $request->only('email', 'password');

        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => 'Credenciales Invalidas'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not create token!'
            ], 500);
        }        

        $user = Auth::user();

        
        return response()->json([
                            'token' => $token,
                            'user' => $user,
                            ]);
        
    }

    public function checkAuth() {
        
        $user = JWTAuth::parseToken()->authenticate();

        return response()->json(['user' => $user]);

    }

    public function index()
    {
        $galerias = AlbumClient::where('client_id', Auth::user()->id)->orderBy('date','desc')->get();

        return view('client/index')->with('galerias',$galerias);
    }

    public function getAlbum($id){
        $galeria = AlbumClient::find($id);

        return view('client/gallery')->with('galeria', $galeria);
    }

    public function getImages($id){
        return AlbumImagesClient::where('album_clients_id', $id)->orderBy('id','desc')->get();
    }
}
