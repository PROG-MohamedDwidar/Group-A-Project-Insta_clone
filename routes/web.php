<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;

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
    return view('auth.login');
});
// ->middleware(['auth', 'verified'])
Route::get('/dashboard', [PostController::class,'index'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/users/{id}',  [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit',  [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}',  [UserController::class, 'update'])->name('users.update');
Route::post('/users/{id}/follow',  [UserController::class, 'follow'])->name('users.follow');
Route::post('/users/{id}/unfollow',  [UserController::class, 'unfollow'])->name('users.unfollow');
Route::post('/users/searchResult',  [UserController::class, 'search'])->name('users.search');
Route::get('/users/{id}/followers',  [UserController::class, 'followers'])->name('users.followers');
Route::get('/users/{id}/following',  [UserController::class, 'following'])->name('users.following');

// Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',  [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/deleted',  [PostController::class, 'deleted'])->name('posts.deleted');
Route::put('/posts/deleted/{id}',  [PostController::class, 'restore'])->name('posts.restore');
Route::post('/posts',  [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/comments',  [PostController::class, 'storeComment'])->name('posts.storeComment');
Route::post('/posts/like',  [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/unlike',  [PostController::class, 'unlike'])->name('posts.unlike');
Route::get('/posts/{id}',  [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit',  [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}',  [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}',  [PostController::class, 'delete'])->name('posts.delete');

Route::get('/tag/{id}',  [PostController::class, 'showtag'])->name('tags.show');
