<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogImage;
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
        $historia = $request->historia;
        $titulo = $request->titulo;


        $blog = new Blog;
    }
}
