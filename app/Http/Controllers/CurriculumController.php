<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use Intervention\Image\ImageManager;

class CurriculumController extends Controller {

    public function index() {
        
    	$curriculums = Curriculum::get();
        
        return view('admin/curriculum/index')->with(
        	['curriculums' => $curriculums]
        );
        
    }

    public function create() {
        return view('admin/curriculum/create');
    }

    public function createCurriculum(Request $request) {

        $this->validate($request, [
            'type' => 'required || unique:curriculum_types, type',
        ]);

        $curriculum = new Curriculum();
        
        $curriculum->name = $request->name;
        $curriculum->description = $request->description;
        
        $curriculum->save();

        return back()->with('msj' , 1);
    }

    public function addCurriculumImages($id) {
    	
    	$curriculum = Curriculum::find($id);
    	
        return view('admin/curriculum/charge')->with('curriculum', $curriculum);
        
    }

    public function something() {



        return "working";
    }
}
