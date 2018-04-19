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
        
    	$curriculums = Curriculum::paginate(5);
        
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
            'image' => 'required|image',
        ]);

        $img = $request->file('image');
        $path = $img->getClientOriginalName(). "-" .time() . '.' . $img->getClientOriginalExtension();
        $img = Image::make($img);

        if ($img->width() >= $img->height()) {
            $img->resize(1300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(directories::getCurriculumPath() . "principal_" . $path);
            $img->fit(600, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(directories::getCurriculumPath() . "secundaria_" . $path);
        } else {
            return back()->withInput();
        }

        $curriculum = new Curriculum;

        $curriculum->name = $request->name;
        $curriculum->description = $request->description;
        $curriculum->image = $path;

        $curriculum->save();

        $curriculum = Curriculum::select('id')->orderBy('id', 'desc')->first();
        return redirect('admin/curriculum/upload/' . $curriculum->id);
    }
    public function edit($id){
        $curriculum = Curriculum::find($id);
        return view("admin/curriculum/edit")->with('curriculum',$curriculum);

    }

    public function update($id, Request $request){


        $this->validate($request, [
            'description' => 'required',
            'name' => 'required|max:100',
        ]);

        $curriculum = Curriculum::find($id);

        if ($request->image) {
            $img = $request->file('image');
            $path = $img->getClientOriginalName(). "-" .time() . '.' . $img->getClientOriginalExtension();
            $img = Image::make($img);
            if ($img->width() >= $img->height()) {
                $img->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save(directories::getCurriculumPath() . "principal_" . $path);
                $img->fit(600, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save(directories::getCurriculumPath() . "secundaria_" . $path);

                Storage::disk('curriculum')->delete('principal_'.$curriculum->image);
                Storage::disk('curriculum')->delete('secundaria_'.$curriculum->image);

                $curriculum->image = $path;
            } else {
                return back()->withInput();
            }
        }

        $curriculum->name = $request->name;
        $curriculum->description = $request->description;

        $curriculum->save();

        return back()->with('msj' , 'success');
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

        $file_route = $img->getClientOriginalName(). "-" .time() . '.' . $img->getClientOriginalExtension();

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

        return $img;

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

        Storage::disk('curriculum')->delete('principal_'.$curriculum->image);
        Storage::disk('curriculum')->delete('secundaria_'.$curriculum->image);

        $curriculum->delete();
        return back();
    }

    public function getImages(Request $request) {

	    $method = $request->method;

	    if ($method == 'inicio') {

	        $idCurriculum =  $request->id;

	        return CurriculumImage::where('curriculum_id', $idCurriculum)->orderBy('id','desc')->take(8)->get();

        }

        if ($method == 'upload') {

            $idCurriculum =  $request->id;

            return CurriculumImage::where('curriculum_id', $idCurriculum)->orderBy('id','desc')->get();

        }

    }

    public function test() {


//	    $path = new directories();
////	    return $path->imagesAplicationPath;
        return  directories::getCurriculumPath();
    }

	
}
