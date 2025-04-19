<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [PostController::class, 'Dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';



Route::get('/admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'Admin'])
    ->name('admin.dashboard');

Route::get('/admin/create', [PostController::class, 'create'])->middleware(['auth', 'Admin'])->name('admin.create');
Route::post('/admin/store', [PostController::class, 'store'])->middleware(['auth', 'Admin'])->name('admin.store');



Route::get('/admin/{id}/edit', [PostController::class, 'edit'])->middleware(['auth', 'Admin'])->name('admin.edit');



Route::put('/admin/{id}', [PostController::class, 'update'])->middleware(['auth', 'Admin'])->name('admin.update');



Route::get('/admin/{id}/destroy', [PostController::class, 'destroy'])->middleware(['auth', 'Admin'])->name('admin.destroy');


Route::get('posts/{id}', [PostController::class, 'show'])->name('post.show');




