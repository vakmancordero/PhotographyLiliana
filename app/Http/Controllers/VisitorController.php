<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\CurriculumImage;

class VisitorController extends Controller
{
    public  function index(){
        $curriculum = Curriculum::all();
        return view('visitor/index')->with('curriculum', $curriculum);
    }
    public function curriculum($id){

        $curriculum = Curriculum::all();

        $images = CurriculumImage::where('curriculum_id', $id)->get();

        return view('visitor/curriculum')->with(['curriculum' => $curriculum, "images" => $images ]);
    }
}
