<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogImage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\directories;

class BlogController extends Controller
{
    public function index(){
        return view('admin/blog/index');
    }

    public function create(){
        return view('admin/blog/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'historia' => 'required',
            'name' => 'required|max:100|unique:blog',
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

        //AUTO COLOCAR <BR>
        $texto = $request->historia;
        $texto = rawurlencode($texto);
        $texto = rawurldecode(str_replace("%0D%0A","<br>",$texto));

        //NUEVO BLOG
        $blog = new Blog;

        $blog->name = $request->name;
        $blog->description = $texto;
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

    public function test(){
        $blog = Blog::select('id')->latest()->first();
        return redirect('admin/blog/upload/' . $blog->id);
    }
}
