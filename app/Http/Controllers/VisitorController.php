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

    public function allPortafolios() {

        $portafolios = Curriculum::orderBy('id')->get();

        foreach($portafolios as $n){
            $n->url = str_replace(' ', '-', $n->name);
            
        }

        return view('visitor/portafolios')->with(['portafolios' => $portafolios]);

    }

    public function portafolio($name){

        $name = str_replace('-', ' ', $name);

        $curriculumActual = Curriculum::where('name', $name)->first();

        return view('visitor/curriculum')->with(["portafolio" => $curriculumActual ]);
    }
    public function curriculumPhotos($id){
        $photos = CurriculumImage::where('curriculum_id', $id)->orderBy('id')->get();        
        return $photos;
    }

    public function login(){


        if(Auth::check()) {

            if(Auth::user()->level == 1) {
                return redirect('admin');
            }
            else if (Auth::user()->level == 0) {
                return redirect('client');
            }


        } else {
            $curriculum = Curriculum::select('id', 'name')->get();
            return view('visitor/login')->with('curriculum', $curriculum);
        }
    }

    public function indexBlog(){
        $blogs =  Blog::paginate(12);

        foreach($blogs as $n){
            $n->link = str_replace(' ', '-', $n->name);
            $n->date = str_replace('-', ' . ', $n->date);
        }

        $curriculum = Curriculum::select('id', 'name')->get();
        return view('visitor/blogIndex')->with(['blogs' => $blogs, 'curriculum' => $curriculum]);
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
