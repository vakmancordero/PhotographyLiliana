<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogImage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\directories;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct() { $this->middleware('admin'); }

    public function index(){

        $blogs = Blog::latest()->paginate(15);

        foreach($blogs as $n){
            $n->link = str_replace(' ', '-', $n->name);
        }
        return view('admin/blog/index')->with('blogs', $blogs);
    }

    public function create(){
        return view('admin/blog/create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'historia' => 'required',
            'name' => 'required|max:100|unique:album_clients',
            'imagen' => 'required|image',
            'date' => 'required'
        ]);


        $img = $request->file('imagen');
        $path = time().'.'. $img->getClientOriginalExtension();
        $img =  Image::make($img);

        if( $img->width() >= $img->height()) {

            $img->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->save(directories::getBlogPath() . $path);
        } else {
            return back()->withInput();
        }


        //NUEVO BLOG
        $blog = new Blog;

        $blog->name = $request->name;
        $blog->description = $request->historia;
        $blog->date = $request->date;
        $blog->image = $path;

        if($request->galeria == "on")
            $blog->gallery = 1 ;

        $blog->save();


        if($request->galeria == "on") {
            $blog = Blog::select('id')->latest()->first();
            return redirect('admin/blog/upload/' . $blog->id);
        } else {
            return back()->with('msj', true);
        }
    }

    public function edit($id) {
            $blog = Blog::find($id);
            return view('admin/blog/edit')->with('blog', $blog);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'historia' => 'required',
            'name' => 'required|max:100',
            'date' => 'required'
        ]);

        $blog = Blog::find($id);

        if ($request->imagen) {
            $img = $request->file('imagen');
            $path = time() . '.' . $img->getClientOriginalExtension();
            $img = Image::make($img);

            if ($img->width() >= $img->height()) {
                $img->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                Storage::disk('blog')->delete($blog->image);
                $img->save(directories::getBlogPath() . $path);

                $blog->image = $path;
            } else {
                return back()->withInput();
            }
        }

        $blog->name = $request->name;
        $blog->description = $request->historia;
        $blog->date = $request->date;

        if ($request->galeria == "on"){
            $blog->gallery = 1;
        } else {
            $blog->gallery = NULL;
        }
        $blog->save();

        return back()->with('msj', true);
    }

    public function uploadView($id) {
        $blog = Blog::find($id);

        return view('admin/blog/upload')->with(['blog' => $blog, 'id' => $id ]);
    }

    public function uploadPhotos($id, Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $img = $request->file('image');

        $file_route = time().'.'. $img->getClientOriginalExtension();

        $img =  Image::make($request->file('image'));



        if( $img->width() >= $img->height()) {
            $img->resize(1500, null , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->save(directories::getBlogPath().'computer/' . $file_route);

            $img->resize(800, null , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->save(directories::getBlogPath().'tablet/' . $file_route);

            $img->resize(500, null , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->save(directories::getBlogPath().'mov/' . $file_route);

            $img->fit(150, 150);
            $img->save(directories::getBlogPath().'app/' . $file_route);
        } else {
            return false;
        }

        $imagen = new BlogImage;

        $imagen->path= $file_route;
        $imagen->blog_id = $id;
        $imagen->save();

        return $imagen;

    }

    public function uploadGetImages($id) {
        return BlogImage::where('blog_id' , $id)->orderBy('id','desc')->get();
    }

    public function uploadDeleteImage($id){

        $this->destroyImage(
            BlogImage::find($id)
        );

        return $id;
    }

    public function destroyBlog($id) {

        $blog = Blog::find($id);

        if($blog->gallery == 1){

            $gallery = BlogImage::where('blog_id', $id)->get();

            foreach($gallery as $img) {
                $this->destroyImage($img);
            }

        }

        Storage::disk('blog')->delete($blog->image);

        $blog->delete();

        return back()->with('msj','Blog Eliminado');
    }

    public function destroyImage($img) {

        Storage::disk('blog')->delete('app/'.$img->path);
        Storage::disk('blog')->delete('computer/'.$img->path);
        Storage::disk('blog')->delete('mov/'.$img->path);
        Storage::disk('blog')->delete('tablet/'.$img->path);
        $img->delete();

    }


    public function test(){
        $blog = Blog::select('id')->latest()->first();
        return redirect('admin/blog/upload/' . $blog->id);
    }
}
