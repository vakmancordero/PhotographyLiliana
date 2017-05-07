<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
