<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Models\Album;
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

Route::get('/', [AlbumController::class,'index']);
Route::post('albums/', [AlbumController::class,'store']);
Route::post('albums/delete', [AlbumController::class,'destroy']);
Route::any('albums/{album}/', [AlbumController::class,'show']);
Route::any('albums/{album}/move-then-delete', [AlbumController::class,'getMoveThenDestroy']);
Route::any('albums/{album}/{reciever}/move-then-delete/', [AlbumController::class,'moveThenDestroy']);


Route::get('albums/{album}/photos/',[PhotoController::class,'index']);
Route::post('albums/{album}/photos/',[PhotoController::class,'store']);
Route::post('albums/{album}/{photo}/delete',[PhotoController::class,'destroy']);
Route::any('albums/{album}/{photo}',[PhotoController::class,'show']);
