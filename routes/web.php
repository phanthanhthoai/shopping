<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductControler;
use App\Http\Controllers\AdminSliderControler;
use App\Http\Controllers\AdminSettingController;
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
Route:: prefix('sliders')->group( function()
{
    Route::get('/index', [AdminSliderControler::class, 'index'])->name('sliders.index');
    Route::get('/create', [AdminSliderControler::class, 'create'])->name('sliders.create');
    Route::post('/save', [AdminSliderControler::class, 'save'])->name('sliders.save');
    Route::get('/edit/{id}', [AdminSliderControler::class, 'edit'])->name('sliders.edit');
    Route::get('/delete/{id}', [AdminSliderControler::class, 'delete'])->name('sliders.delete');
    Route::post('/update/{id}', [AdminSliderControler::class, 'update'])->name('sliders.update');
});
Route:: prefix('settings')->group( function()
{
    Route::get('/index', [AdminSettingController::class, 'index'])->name('settings.index');
    // Route::get('/create', [AdminSettingController::class, 'create'])->name('settings.create');
    // Route::post('/save', [AdminSettingController::class, 'save'])->name('settings.save');
    // Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('settings.edit');
    // Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])->name('settings.delete');
    // Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
