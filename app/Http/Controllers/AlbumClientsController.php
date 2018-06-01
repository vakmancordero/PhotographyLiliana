<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AlbumClient;
use App\AlbumImagesClient;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\directories;
use Illuminate\Support\Facades\Storage;
use File;

class AlbumClientsController extends Controller
{
    public function __construct() { $this->middleware('admin'); }

    public function userGallery($id)
    {
        $user = User::find($id);
        $albums = AlbumClient::where('client_id', $user->id)->orderBy('date','desc')->get();
        return view('admin/usuarios/galleries')->with(['usuario' => $user, 'galerias' => $albums]);
    }

    public function getAllClientGalleries() {
        $galerias = AlbumClient::orderBy('date','desc')->paginate(15);

        return view('admin/userGallery/list')->with("galerias", $galerias);
    }

    public function getGallery($id)
    {
        $gallery = AlbumClient::find($id);
        $user = User::find($gallery->client_id);
        $images = AlbumImagesClient::where('album_clients_id', $gallery->id)->get();

        return view('admin/userGallery/show')->with(['gallery' => $gallery, 'images' => $images, 'client' => $user]);
    }

    public function getSelectedBlade($id) {
        $gallery = AlbumClient::find($id);
        $user = User::find($gallery->client_id);
        $images = AlbumImagesClient::where('album_clients_id', $gallery->id)->get();
        return view('admin/userGallery/selectedImages')
        ->with(['gallery' => $gallery, 'images' => $images, 'client' => $user]);
    }

    public function getSelectedImages($id) {
        return AlbumImagesClient::where([
                    ['album_clients_id', $id],
                    ['select', 1]
                    ])->get();
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

        $path = $img->getClientOriginalName();

        $album = new AlbumClient();

        $album->client_id = $id;
        $album->name = $request->name;
        $album->img = $path;
        $album->disponible = $request->disponible;
        $album->date = $request->date;

        $album->save();

        $id = $album->id;

        $result = File::makeDirectory(directories::getClientPath() . $id);
        $result = File::makeDirectory(directories::getClientPath() . $id . '/mov');
        $result = File::makeDirectory(directories::getClientPath() . $id . '/computer');
        $result = File::makeDirectory(directories::getClientPath() . $id . '/app');
        $result = File::makeDirectory(directories::getClientPath() . $id . '/store');
        

        $img = Image::make($img);

        if ($img->width() >= $img->height()) {

            $img->resize(1300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(directories::getClientPath() . $id . "/principal_" . $path);

            $img->fit(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(directories::getClientPath() . $id ."/secundaria_" . $path);

        } else {
            return back()->withInput();
        }

        return redirect('admin/galleryClient/' . $album->id . "/upload");
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

        //Verify Process uNIQUE FOR ALBUM
        $verify = AlbumImagesClient::where([
                    ['path', $img->getClientOriginalName() ],
                    ['album_clients_id', $id ]
                    ])->first();

        

        if(isset($verify->id))  return response()->json(['error' => 'File Duplicate'], 403);

        $file_route = $img->getClientOriginalName();

        $imagen1 = Image::make($request->file('image'));
        $mask = Image::make(directories::getMaskPath() . 'waterMark.png');

        $imagen1->save(directories::getClientPath() . $id .'/store/' . $file_route);

        if ($imagen1->width() >= $imagen1->height()) {            

            $imagen1->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imagen1->insert($mask, 'bottom-right' ,  10, 10);
            $imagen1->save(directories::getClientPath() . $id .'/computer/' . $file_route);

            $imagen1->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getClientPath() . $id .'/mov/' . $file_route);



        } else {
            $imagen1->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->insert($mask, 'bottom-right' ,  10, 10);
            $imagen1->save(directories::getClientPath() . $id .'/computer/' . $file_route);


            $imagen1->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getClientPath() . $id .'/mov/' . $file_route);

        }

        $imagen1->fit(150, 150);
        $imagen1->save(directories::getClientPath() . $id .'/app/' . $file_route);

        $imagen = new AlbumImagesClient();
        $imagen->album_clients_id = $id;
        $imagen->path = $file_route;
        $imagen->select = 0;
        $imagen->save();

        return $imagen;

    }

    public function destroyGallery($id)
    {
        $galeria = AlbumClient::find($id);
        AlbumImagesClient::where('album_clients_id', $galeria->id)->delete();
        File::deleteDirectory(directories::getClientPath() . $galeria->id);

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

    public function reorganizeAll() {
        
        $albums = AlbumClient::all();

        foreach($albums as $album) {

        $id = $album->id;

        $result = File::makeDirectory(directories::getClientPath() . $id);
        $result = File::makeDirectory(directories::getClientPath() . $id . '/mov');
        $result = File::makeDirectory(directories::getClientPath() . $id . '/computer');
        $result = File::makeDirectory(directories::getClientPath() . $id . '/app');
        $result = File::makeDirectory(directories::getClientPath() . $id . '/store');

        $patoFrom1 = directories::getClientPath() . 'principal_' .$album->img;
        $patoFrom2 = directories::getClientPath() . 'secundaria_' .$album->img;

        $patoTo1 = directories::getClientPath() . $id . '/principal_' . $album->img;
        $patoTo2 = directories::getClientPath() . $id . '/secundaria_' . $album->img;
        
        File::move($patoFrom1, $patoTo1);
        File::move($patoFrom2, $patoTo2);

        $photos = AlbumImagesClient::where('album_clients_id', $id)->get(); {
            
            foreach($photos as $pho) {

                $patoFrom1 = directories::getClientPath() . '/mov/' . $pho->path;
                $patoFrom2 = directories::getClientPath() . '/computer/' . $pho->path;
                $patoFrom3 = directories::getClientPath() . '/app/' . $pho->path;

                $patoTo1 = directories::getClientPath() . $pho->album_clients_id . '/mov/' . $pho->path;
                $patoTo2 = directories::getClientPath() . $pho->album_clients_id . '/computer/' . $pho->path;
                $patoTo3 = directories::getClientPath() . $pho->album_clients_id . '/app/' . $pho->path;

                File::move($patoFrom1, $patoTo1);
                File::move($patoFrom2, $patoTo2);
                File::move($patoFrom3, $patoTo3);

            }

        }


    
        }

        return 'archivos reorganizados';

    }
}
