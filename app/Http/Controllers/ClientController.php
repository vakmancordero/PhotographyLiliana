<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlbumClient;
use App\AlbumImagesClient;
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

    public function getAlbums(){

        $user = JWTAuth::parseToken()->authenticate();
        $galerias = AlbumClient::where('client_id', $user->id)->orderBy('date','desc')->get();

        return response()->json($galerias);

    }

    public function getPhotos($id) {

        $user = JWTAuth::parseToken()->authenticate();
        $galerias = AlbumClient::where('client_id', $user->id)->orderBy('date','desc')->get();

        foreach($galerias as $g) {

            if($g->id == $id){

                $photos = AlbumImagesClient::where('album_clients_id', $id)->orderBy('path','desc')->get();
                return response()->json([ 'photos' => $photos, 'album' => $g]);
            }

        }

        return response()->json(['error' => 'Album Invalid'], 402);

    }

    public function storeSelection(Request $request) {

        $photos = $request->photos;


        AlbumImagesClient::where('album_clients_id', $request->album_id)->update(['select' => 0]);

        foreach($photos as $photo) {
            
            $photo = json_decode(json_encode($photo), FALSE);

            if($photo->select == true) {
                $p = AlbumImagesClient::find($photo->id);
                $p->select = $photo->select;
                $p->save();
            }
            
        }

        $album = AlbumClient::find($request->album_id);
        $album->status = 2;
        $album->save();

        return response()->json('Seleccion Guardada');

        // AlbumImagesClient::where('album_clients_id', $id)->orderBy('name','desc')->get();

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
