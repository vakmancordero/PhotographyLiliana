<?php

Route::get('/', 'VisitorController@index');

Route::get('portafolio/{id}', 'VisitorController@curriculum' );
Route::get('portafolio/fotos/{id}', 'VisitorController@curriculumPhotos' );

Auth::routes();

// Vista principal
Route::get('/home', 'HomeController@index');

// Lista los curriculums existentes.
Route::get('admin/curriculum', 'CurriculumController@index');

// -> GET
// Retorna la vista para crear un curriculum.
Route::get('admin/curriculum/create', 'CurriculumController@create');

// -> POST
// Crea el curriculum.
Route::post('admin/curriculum/create', 'CurriculumController@createCurriculum');

Route::get('admin/curriculum/delete/{id}', 'CurriculumController@destroyCurriculum');

Route::get('admin/curriculum/images/{id}', 'CurriculumController@destroyImage');

// -> GET
// Retorna el centro de carga para el curriculum seleccionado [ID]
Route::get('admin/curriculum/upload/{id}', 'CurriculumController@uploadImages');

Route::post('admin/curriculum/{id}/images', [
	'as' => 'store_path',
	'uses' => 'CurriculumController@addImage'
]);

Route::get('admin/getImages', 'CurriculumController@getImages');

