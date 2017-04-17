<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Forms\Flash;
use App\Http\Requests\ArticleRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticlesController extends Controller
{
	/**
	 * Checks if a user is authenticated in order to visit the routes.
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show', 'index']]);
	}
	
	/**
	 * Shows the form for creating a new article.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}
	
	/**
	 * Stores a newly created article.
	 *
	 * This method validates the form, persists the article into
	 * the database table and then redirects to a certain page with
	 * the flash messaging system.
	 *
	 * @param ArticleRequest $request
	 * @param Flash $flash
	 * @return Response
	 */
	public function store(ArticleRequest $request, Flash $flash)
	{
		$request["user_id"] = Auth::user()->id;
		$article = Article::create($request->all());
		$flash->success('Success!', 'Your article has been created.');
		
		return redirect('articles/' . $article->id);
	}
	
	/**
	 * Displays all articles.
	 *
	 * @return mixed
	 */
	public function index()
	{
		$articles = Article::orderBy('id', 'asc')->get();
		return view('articles.index', compact('articles'));
	}
	
	/**
	 * Displays the specified article.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::getOne($id);
		
		return view('articles.show', compact('article'));
	}
	
	/**
	 * Applies an image to the referenced article.
	 *
	 * @param int $id
	 * @param Request $request
	 * @return mixed
	 */
	public function addImage($id, Request $request)
	{
		$this->validate($request, [
			'image' => 'required|mimes:jpg,jpeg,gif,png,bmp'
		]);
		$article = Article::getOne($id);
		if (!$article->ownedBy(Auth::user())) {
			return $this->unauthorized($request);
		}
		$img = $this->makeImage($request->file('image'));
		$article->saveImage($img);
		
		return $img;
	}
	
	/**
	 * Guards against unauthorized access.
	 *
	 * @param Request $request
	 * @return mixed
	 */
	private function unauthorized(Request $request)
	{
		if ($request->ajax()) {
			return response(['message' => 'Forbidden'], 403);
		}
		flash('Forbidden');
		
		return redirect('/');
	}
	
	/**
	 * Makes a new image.
	 *
	 * @param UploadedFile $file
	 * @return Image
	 */
	private function makeImage(UploadedFile $file)
	{
		return Image::build($file->getClientOriginalName())->store($file);
	}
	
	/**
	 * Removes the image.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroyImage($id)
	{
		Image::findOrFail($id)->delete();
		
		return back();
	}
}

