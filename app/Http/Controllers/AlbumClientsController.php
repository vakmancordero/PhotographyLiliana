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
    public function __construct() { $this->middleware('admin'); }

    public function userGallery($id)
    {
        $user = User::find($id);
        $albums = AlbumClient::where('client_id', $user->id)->get();
        return view('admin/usuarios/galleries')->with(['usuario' => $user, 'galerias' => $albums]);
    }

    public function getGallery($id)
    {
        $gallery = AlbumClient::find($id);
        $user = User::find($gallery->client_id);
        $images = AlbumImagesClient::where('album_clients_id', $gallery->id)->get();

        return view('admin/userGallery/show')->with(['gallery' => $gallery, 'images' => $images, 'client' => $user]);
    }

    public function getImages($id)
    {
        return AlbumImagesClient::where('album_clients_id', $id)->get();
    }

    public function createGallery($id)
    {
        return view('admin/userGallery/create')->with(['id' => $id]);
    }

    public function storeGallery($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
            'date' => 'required',
            'disponible' => 'required'
        ]);

        $img = $request->file('image');

        $path = time() . '.' . $img->getClientOriginalExtension();

        $img = Image::make($img);

        if ($img->width() >= $img->height()) {

            $img->resize(1300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(directories::getClientPath() . "principal_" . $path);

            $img->fit(600, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(directories::getClientPath() . "secundaria_" . $path);

        } else {
            return back()->withInput();
        }


        $album = new AlbumClient();

        $album->client_id = $id;
        $album->name = $request->name;
        $album->img = $path;
        $album->disponible = $request->disponible;
        $album->date = $request->date;

        $album->save();

        return redirect('admin/galleryClient/' . $album->id);
    }

    public function getUploadView($id)
    {
        $album = AlbumClient::find($id);
        return view('admin/userGallery/uploadPhotos')->with(['id' => $id, 'album' => $album]);
    }

    public function saveImages($id, Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $img = $request->file('image');

        $file_route = time() . '.' . $img->getClientOriginalExtension();

        $imagen1 = Image::make($request->file('image'));

        if ($imagen1->width() >= $imagen1->height()) {
            $imagen1->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getClientPath() . 'computer/' . $file_route);

            $imagen1->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getClientPath() . 'mov/' . $file_route);

        } else {
            $imagen1->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getClientPath() . 'computer/' . $file_route);


            $imagen1->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getClientPath() . 'mov/' . $file_route);

        }

        $imagen1->fit(150, 150);
        $imagen1->save(directories::getClientPath() . 'app/' . $file_route);

        $imagen = new AlbumImagesClient();
        $imagen->album_clients_id = $id;
        $imagen->path = $file_route;
        $imagen->select = 0;
        $imagen->save();

        return $file_route;

    }

    public function destroyGallery($id)
    {
        $galeria = AlbumClient::find($id);
        $imagenes = AlbumImagesClient::where('album_clients_id', $galeria->id)->get();

        foreach($imagenes as $img){
            $this->destroyImage($img);
        }

        Storage::disk('client')->delete('principal_'.$galeria->img);
        Storage::disk('client')->delete('secundaria_'.$galeria->img);

        $galeria->delete();
        return back();
    }

    public function deleteImage($id)
    {
        $this->destroyImage(AlbumImagesClient::find($id));
        return 'eliminado' . $id;
    }

    public function destroyImage($img) {

        Storage::disk('client')->delete('app/'.$img->path);
        Storage::disk('client')->delete('computer/'.$img->path);
        Storage::disk('client')->delete('mov/'.$img->path);
        $img->delete();
    }
}
