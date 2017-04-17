<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\CurriculumTypes;
use Intervention\Image\ImageManager;

class CurriculumController extends Controller {

    public function index() {
        $curriculumSections = CurriculumTypes::get();
        return view('admin/curriculum/index')->with(['curriculumSections' => $curriculumSections]);
    }

    public function create() {
        return view('admin/curriculum/create');
    }

    public function newCurriculum(Request $request) {

        $this->validate($request, [
            'type' => 'required || unique:curriculum_types, type',
        ]);

        $registroNuevo = new CurriculumTypes();
        $registroNuevo->type = $request->type;
        $registroNuevo->order = 1;
        $registroNuevo->save();

        return back()->with('msj' , 1);
    }

    public function centroCarga($id)
    {
        return view('admin/curriculum/charge')->with('id', $id);
    }

    public function something() {



        return "working";
    }
}
