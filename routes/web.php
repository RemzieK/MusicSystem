<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SearchController;



Route::get('/', function () {
    return view('index');
});

Route::get('/author', function () {
    return view('author');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

Route::get('/index', function () {
    return view('index');
});


Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('/images/upload/{album_id}', [ImageController::class, 'store'])->name('images.upload');
Route::delete('/images/{image_id}', [ImageController::class, 'delete'])->name('images.delete');

Route::post('/author', [AdminAuthController::class, 'register'])->name('author.register');

Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/', [AdminAuthController::class, 'logout'])->name('logout');


Route::get('/explore/create', [ExploreController::class, 'create'])->name('explore.create');
Route::post('/explore', [ExploreController::class, 'store'])->name('explore.store');
Route::get('/explore/search', [SearchController::class, 'search'])->name('explore.search');
Route::get('explore/edit/{id}', [ExploreController::class, 'edit'])->name('explore.edit');
Route::put('/explore/update/{id}', [ExploreController::class, 'update'])->name('explore.update');
Route::delete('/explore/delete/{id}', [ExploreController::class, 'delete'])->name('explore.delete');
