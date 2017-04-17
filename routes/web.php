<?php

Route::get('/', function () {
    return view('visitor/index');
});

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

// -> GET
// Retorna el centro de carga para el curriculum seleccionado [ID]
Route::get('admin/curriculum/upload/{id}', 'CurriculumController@uploadImages');