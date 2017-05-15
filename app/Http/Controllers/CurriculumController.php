<?php

namespace App\Http\Controllers;

use App\Curriculum;
use App\CurriculumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CurriculumController extends Controller
{
    public function __construct() { $this->middleware('admin'); }

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
            'description' => 'required',
            'name' => 'required|max:100|unique:curriculum',
        ]);

        $curriculum = new Curriculum;

        $curriculum->name = $request->name;
        $curriculum->description = $request->description;

        $curriculum->save();

        $curriculum = Curriculum::select('id')->orderBy('id', 'desc')->first();
        return redirect('admin/curriculum/upload/' . $curriculum->id);
    }

    public function uploadImages($id) {
    	
    	$curriculum = Curriculum::find($id);

        return view('admin/curriculum/upload')->with('curriculum', $curriculum);
    }
	
	public function addImage($id, Request $request) {
    	
		$this->validate($request, [
			'image' => 'required|image'
		]);

        $img = $request->file('image');

        $file_route = time().'.'. $img->getClientOriginalExtension();

        $imagen1 =  Image::make($request->file('image'));

        if( $imagen1->width() >= $imagen1->height()) {
            $imagen1->resize(1500, null , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getCurriculumPath().'computer/' . $file_route);

            $imagen1->resize(800, null , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getCurriculumPath().'tablet/' . $file_route);

            $imagen1->resize(500, null , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getCurriculumPath().'mov/' . $file_route);

            $imagen1->fit(150, 150);
            $imagen1->save(directories::getCurriculumPath().'app/' . $file_route);
        }

        else {
            $imagen1->resize(null, 1500 , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getCurriculumPath().'computer/' . $file_route);

            $imagen1->resize(null, 800 , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getCurriculumPath().'tablet/' . $file_route);

            $imagen1->resize(null, 500 , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imagen1->save(directories::getCurriculumPath().'mov/' . $file_route);

            $imagen1->fit(150, 150);
            $imagen1->save(directories::getCurriculumPath().'app/' . $file_route);


        }

        $img = new CurriculumImage();
        $img->curriculum_id = $id;
        $img->name = $file_route;
        $img->path = $file_route;
        $img->save();

        return 'true';

//		$curriculum = Curriculum::getOne($id);
//		$img = $this->makeImage($request->file('image'));
//		$curriculum->saveImage($img);
//		return $img;
	}
	
	private function makeImage(UploadedFile $file) {
		return CurriculumImage::build($file->getClientOriginalName())->store($file);
	}
	
	public function destroyImage($id) {
    	
		CurriculumImage::findOrFail($id)->delete();
		return 'true';
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

    public function getImages(Request $request) {

	    $method = $request->method;

	    if ($method == 'inicio') {

	        $idCurriculum =  $request->id;

	        return CurriculumImage::where('curriculum_id', $idCurriculum)->get();

        }

    }

    public function test() {


//	    $path = new directories();
////	    return $path->imagesAplicationPath;
        return  directories::getCurriculumPath();
    }

	
}
