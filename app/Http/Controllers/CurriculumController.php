<?php

namespace App\Http\Controllers;

use App\Curriculum;
use App\CurriculumImage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

        $curriculum = new Curriculum();
        
        $curriculum->name = $request->name;
        $curriculum->description = $request->description;
        
        $curriculum->save();

        return back()->with('msj', 1);
    }

    public function uploadImages($id) {
    	
    	$curriculum = Curriculum::find($id);

        return view('admin/curriculum/upload')->with('curriculum', $curriculum);
    }
	
	public function addImage($id, Request $request) {
    	
		$this->validate($request, [
			'image' => 'required|mimes:jpg,jpeg,gif,png,bmp'
		]);
		
		$curriculum = Curriculum::getOne($id);
		
		$img = $this->makeImage($request->file('image'));
		
		$curriculum->saveImage($img);
		
		return $img;
	}
	
	private function makeImage(UploadedFile $file) {
		return CurriculumImage::build($file->getClientOriginalName())->store($file);
	}
	
	public function destroyImage($id) {
    	
		CurriculumImage::findOrFail($id)->delete();
		
		return back();
	}

	public function destroyCurriculum($id){

        $curriculum = Curriculum::find($id);
        $images = CurriculumImage::where(['curriculum_id' => $id])->get();

        foreach($images as $image) {

            $image->delete();

        }

            $curriculum->delete();
            return back();
    }
	
}
