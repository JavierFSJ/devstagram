<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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
    return view('principal');
})->name('principal');

Route::get('/register', [RegisterController::class , 'index'])->name('register.index');
Route::post('/register' , [RegisterController::class , 'store'])->name('register.store');

Route::get('/login' , [LoginController::class , 'index'])->name('login');
Route::post('/login' , [LoginController::class , 'store']);
Route::post('/logout' , [LogoutController::class , 'store'])->name('logout');

Route::get('/{user:username}' , [PostController::class , 'index'])->name('post.index');
Route::get('/posts/create' , [PostController::class , 'create'])->name('post.create');
Route::post('/posts' , [PostController::class , 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}' , [PostController::class , 'show'])->name('post.show');

Route::post('/imagenes' , [ImagenController::class , 'store'])->name('imagen.store');