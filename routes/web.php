<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CrudController;


Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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

Route::get('/images/change/{album_id}', [ImageController::class, 'change'])->name('images.change');
Route::get('/images/delete/{album_id}', [ImageController::class, 'delete'])->name('images.delete');
Route::get('/images/upload/{album_id}', [ImageController::class, 'uploadNew'])->name('images.upload');
Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('/images/upload/{album_id}', [ImageController::class, 'store'])->name('images.upload');

Route::get('/album/{id}', [ImageController::class, 'showAlbum'])->name('album.show');
Route::get('/image/{id}', [ImageController::class, 'showImage'])->name('image.show');



Route::get('/author', [AdminAuthController::class, 'showRegistrationForm'])->name('author');
Route::post('/author', [AdminAuthController::class, 'register'])->name('author.register');

Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('login');

Route::post('/', [AdminAuthController::class, 'logout'])->name('logout');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
Route::get('/explore/create', [ExploreController::class, 'create'])->name('explore.create');

Route::get('/create', [ExploreController::class,'create'])->name('explore.create');
Route::post('/explore', [ExploreController::class, 'store'])->name('explore.store');

Route::get('explore/edit/{id}', [ExploreController::class, 'edit'])->name('explore.edit');
Route::put('/explore/{id}', [ExploreController::class, 'update'])->name('explore.update');
Route::put('/explore/update/{id}', [ExploreController::class, 'update'])->name('explore.update');

Route::delete('/explore/delete/{id}', [ExploreController::class, 'delete'])->name('explore.delete');




Route::resource('genres', GenreController::class);
Route::resource('artists', ArtistController::class);
