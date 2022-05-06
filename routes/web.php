<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/albums', [Controllers\AlbumController::class, 'index'])->name('albums');
//Route::get('/create', [Controllers\AlbumController::class, 'create'])->name('create');
Route::resource('albums', 'App\Http\Controllers\AlbumController');
Route::get('/add-photo/{id}', [App\Http\Controllers\AlbumController::class, 'add_photo'])->name('albums.add_photo');
Route::post('/store-photo', [App\Http\Controllers\AlbumController::class, 'store_photo'])->name('albums.store_photo');
Route::get('/delete_album/{id}', [App\Http\Controllers\AlbumController::class, 'delete_album'])->name('albums.delete_album');
Route::get('/delete/{id}', [App\Http\Controllers\AlbumController::class, 'delete_form'])->name('delete');

Route::get('/choose_album', [App\Http\Controllers\AlbumController::class, 'choose_album'])->name('choose_album');
Route::post('/store-photos/{id}', [App\Http\Controllers\AlbumController::class, 'store_photos'])->name('albums.store_photos');
