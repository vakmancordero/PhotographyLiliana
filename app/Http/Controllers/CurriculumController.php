<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\CurriculumTypes;
use Intervention\Image\ImageManager;

class CurriculumController extends Controller {

    public function index() {
        return view('admin/curriculum/index');
    }

    public function create() {
        return view('admin/curriculum/create');
    }

    public function newCurriculum(Request $request) {

        $this->validate($request, [
            'type' => 'required||unique:curriculum_types,type',
        ]);

        $registroNuevo = new CurriculumTypes();
        $registroNuevo->type = $request->type;
        $registroNuevo->order = 1;
        $registroNuevo->save();

        return back()->with('msj' , 1);
    }

    public function something() {



        return "working";
    }
}
