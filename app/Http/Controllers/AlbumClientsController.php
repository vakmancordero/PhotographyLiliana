<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AlbumClient;
use App\AlbumImagesClient;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\directories;
use Illuminate\Support\Facades\Storage;

class AlbumClientsController extends Controller
{
    public function listClients()
    {
        $clients = User::paginate(15)->get();

        return $clients;
    }

    public function createAlbum()
    {

    }

    public function storeAlbum()
    {

    }

    public function editAlbum()
    {

    }

    public function updateAlbum()
    {

    }

    public function getAlbumList()
    {

    }

    public function showAlbum()
    {

    }
}
