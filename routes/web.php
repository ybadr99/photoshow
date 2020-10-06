<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','AlbumsController@index')->name('album');
Route::get('/albums','AlbumsController@index');
Route::get('/albums/create','AlbumsController@create');
Route::get('/albums/{id}','AlbumsController@show');
Route::post('/albums','AlbumsController@store')->name('albums.store');

//Photos
Route::get('/photos/create/{id}','PhotosController@create')->name('photos.create');
Route::post('/photos/store','PhotosController@store')->name('photos.store');
Route::get('/photos/{id}','PhotosController@show')->name('photos.show');
Route::delete('/photos/{id}','PhotosController@destroy')->name('photos.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
