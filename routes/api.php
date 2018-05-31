<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', 'ClientController@login');
Route::get('checkAuth', 'ClientController@checkAuth');
Route::get('albums', 'ClientController@getAlbums');
Route::get('album/{id}', 'ClientController@getPhotos');
Route::post('album/storeSelection', 'ClientController@storeSelection');
