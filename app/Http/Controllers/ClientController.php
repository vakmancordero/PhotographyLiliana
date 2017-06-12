<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlbumClient;
use App\AlbumImagesClient;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{


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
