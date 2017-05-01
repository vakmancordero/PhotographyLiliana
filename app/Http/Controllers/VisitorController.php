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

        $curriculum = Curriculum::select('id' , 'name')->get();
        $actual = Curriculum::find($id);

        $images = CurriculumImage::where('curriculum_id', $id)->get();

        return view('visitor/curriculum')->with(['curriculum' => $curriculum, "images" => $images, "curriculumActual" => $actual ]);
    }
    public function curriculumPhotos($id){
        $photos = CurriculumImage::where('curriculum_id', $id)->get();
        return $photos;
    }
}
