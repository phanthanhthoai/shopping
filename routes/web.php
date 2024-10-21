<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductControler;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route:: prefix('categories')->group( function()
{
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/save', [CategoryController::class, 'save'])->name('categories.save');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

});
Route:: prefix('products')->group( function()
{
    Route::get('/index', [AdminProductControler::class, 'index'])->name('adminproduct.index');
    Route::get('/create', [AdminProductControler::class, 'create'])->name('adminproduct.create');
    Route::post('/save', [AdminProductControler::class, 'save'])->name('adminproduct.save');
    Route::get('/edit/{id}', [AdminProductControler::class, 'edit'])->name('adminproduct.edit');
    Route::get('/delete/{id}', [AdminProductControler::class, 'delete'])->name('adminproduct.delete');
    Route::post('/update/{id}', [AdminProductControler::class, 'update'])->name('adminproduct.update');
});

require __DIR__.'/auth.php';
