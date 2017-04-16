<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;

class CurriculumController extends Controller
{
    public function index() {
        return view('admin/curriculum/index');
    }
}
