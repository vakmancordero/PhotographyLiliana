<?php

Route::get('/', 'VisitorController@index');

Route::get('portafolio/{name}', 'VisitorController@portafolio' );
Route::get('portafolio/fotos/{id}', 'VisitorController@curriculumPhotos' );

Route::get('blog', 'VisitorController@indexBlog' );
Route::get('blog/{name}', 'VisitorController@blog' );
Route::get('blogGallery/{id}', 'VisitorController@blogGetGallery' );
Route::get('login' , 'VisitorController@login');

Route::post('login', 'AuthController@login');
Route::get('/admin', 'AuthController@auth');
Route::get('/logout', 'AuthController@logout');
//Auth::routes();

// Vista principal


Route::get('admin/curriculum', 'CurriculumController@index');

Route::get('admin/curriculum/create', 'CurriculumController@create');
Route::post('admin/curriculum/create', 'CurriculumController@createCurriculum');

Route::get('admin/curriculum/edit/{id}', 'CurriculumController@edit');
Route::post('admin/curriculum/edit/{id}', 'CurriculumController@update');

Route::get('admin/curriculum/delete/{id}', 'CurriculumController@destroyCurriculum');
Route::get('admin/curriculum/images/{id}', 'CurriculumController@destroyImage');
Route::get('admin/curriculum/upload/{id}', 'CurriculumController@uploadImages');

Route::post('admin/curriculum/{id}/images', [
	'as' => 'store_path',
	'uses' => 'CurriculumController@addImage'
]);

Route::get('admin/getImages', 'CurriculumController@getImages');



//Blog
Route::get('admin/blog' , 'BlogController@index');
Route::get('admin/blog/create' , 'BlogController@create');
Route::post('admin/blog/create' , 'BlogController@store');
Route::get('admin/blog/modificar/{id}', 'BlogController@edit');
Route::post('admin/blog/modificar/{id}', 'BlogController@update');
Route::get('admin/blog/upload/{id}' , 'BlogController@uploadView');
Route::post('admin/blog/upload/{id}' , 'BlogController@uploadPhotos');
Route::get('admin/blog/upload/getImages/{id}' , 'BlogController@uploadGetImages');
Route::get('admin/blog/upload/deleteImage/{id}', 'BlogController@uploadDeleteImage');
Route::get('admin/blog/destroy/{id}', 'BlogController@destroyBlog');
Route::get('admin/blog/test' , 'BlogController@test');

//Register
Route::get('admin/clientes/eliminar/{id}', 'UserController@destroy');
Route::get('admin/clientes' , 'UserController@index');
Route::get('admin/clientes/modificar/{id}' , 'UserController@edit');
Route::post('admin/clientes/modificar/{id}' , 'UserController@update');
Route::get('admin/register' , 'UserController@getRegister');
Route::post('admin/register' , 'UserController@postRegister');


//Galeria Clientes Administrador
Route::get('admin/galerias-de-clientes', 'AlbumClientsController@getAllClientGalleries');
Route::get('/admin/clientes/{id}/galerias', 'AlbumClientsController@userGallery');
Route::get('admin/clientes/{id}/crearGaleria' , 'AlbumClientsController@createGallery');
Route::post('admin/clientes/{id}/crearGaleria' , 'AlbumClientsController@storeGallery');
Route::get('admin/galleryClient/{id}/upload', 'AlbumClientsController@getUploadView');
Route::post('admin/galleryClient/{id}/upload', 'AlbumClientsController@saveImages');
Route::get('admin/galleryClient/{id}', 'AlbumClientsController@getGallery');
Route::get('admin/galleryClient/{id}/getImages', 'AlbumClientsController@getImages');
Route::get('admin/galleryClient/deleteImage/{id}', 'AlbumClientsController@deleteImage');
Route::get('admin/galleryClient/destroyGallery/{id}', 'AlbumClientsController@destroyGallery');

//Area de Clientes
Route::group(['middleware' => 'client'], function () {
    Route::get('client', 'ClientController@index');
    Route::get('client/{id}', 'ClientController@getAlbum');
    Route::get('client/{id}/getImages', 'ClientController@getImages');
});


