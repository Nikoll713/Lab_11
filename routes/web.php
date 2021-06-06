<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Jenssegers\Mongodb\Eloquent;
use Jenssegers\Mongodb\Query\Builder;

Route::get('/', function () {
    return redirect('/posts');
});
Route::get('/home', function () {
    return redirect('/posts');
});

Route::get('/', [PostController::class, 'index']);
Route::view('/posts/create', 'create');
Route::post('/posts/create', [PostController::class, 'create']);
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::view('/posts/create', 'posts.create');
Route::post('/posts/create',[PostController::class, 'store']);
Route::get('/posts/myPosts',[PostController::class,'userPosts']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments',[CommentController::class,'store']);
Route::delete('/posts/{id}',[PostController::class,'delete'])->name('post');
Route::post('/users/{user}',[UserController::class,'update'])->name('update');
Route::delete('/users/{user}',[UserController::class,'destroy'])->name('user.delete');
Route::get('/users',[UserController::class,'index']);
Route::get('/today', [PostController::class, 'today'])->name('today');

Auth::routes();
