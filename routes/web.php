<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
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


Route::get('/project', [AuthorController::class, 'index']);

// Author Routes
Route::post('/author', [AuthorController::class, 'createAuthor']);
Route::get('/authors', [AuthorController::class, 'getAuthors']);
Route::get('/author/{id}', [AuthorController::class, 'getAuthor']);
Route::put('/author/{id}', [AuthorController::class, 'updateAuthor']);
Route::delete('/author/{id}', [AuthorController::class, 'deleteAuthor']);

// Post Routes
Route::post('/author/post', [PostController::class, 'createPost']);
Route::get('/author/post', [PostController::class, 'getPosts']);
Route::get('/author/post/{id}', [PostController::class, 'getPost']);
Route::put('/author/post/{id}', [PostController::class, 'updatePost']);
Route::delete('/author/post/{id}', [PostController::class, 'deletePost']);