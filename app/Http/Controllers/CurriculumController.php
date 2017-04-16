<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use Intervention\Image\ImageManager;

class CurriculumController extends Controller {

    public function index() {
        return view('admin/curriculum/index');
    }

    public function something() {



        return "working";
    }
}
