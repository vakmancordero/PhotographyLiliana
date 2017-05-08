<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\CurriculumImage;
use App\Blog;
use App\BlogImage;
use Illuminate\Support\Facades\Auth;



class VisitorController extends Controller
{
    public  function index(){
        $curriculum = Curriculum::select('id' , 'name')->get();
        $blogs =  Blog::orderBy('date', 'desc')
                ->paginate(3);

        foreach($blogs as $n){
            $n->link = str_replace(' ', '-', $n->name);
            $n->date = str_replace('-', ' . ', $n->date);
        }
        return view('visitor/index')->with(['curriculum' => $curriculum, 'blogs' => $blogs]);
    }
    public function curriculum($id){

        $curriculum = Curriculum::select('id' , 'name')->get();
        $actual = Curriculum::find($id);

        $images = CurriculumImage::where('curriculum_id', $id)->get();

        return view('visitor/curriculum')->with(['curriculum' => $curriculum, "images" => $images, "curriculumActual" => $actual ]);
    }
    public function curriculumPhotos($id){
        $photos = CurriculumImage::where('curriculum_id', $id)->get();
        return $photos;
    }

    public function login(){


        if(Auth::check()) {
            return redirect('admin');
        } else {
            $curriculum = Curriculum::select('id', 'name')->get();
            return view('visitor/login')->with('curriculum', $curriculum);
        }
    }

    public function indexBlog($id){
        $blog =  Blog::find($id);
        return view('visitor/blogShow')->with(['blog' => $blog]);
    }

    public function blog($name){
        $name = str_replace('-', ' ', $name);

        $blog = Blog::where('name', $name)->first();
        $curriculum = Curriculum::select('id', 'name')->get();
        return view('visitor/blog')->with(['blog'=> $blog, 'curriculum' =>$curriculum]);
    }

    public function blogGetGallery($id){
        $gallery = BlogImage::where('blog_id' , $id)->get();
        return $gallery;
    }
}
