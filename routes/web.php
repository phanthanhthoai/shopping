<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
// Route::get('create', [CategoryController::class, 'create']);
Route::prefix('categories')->group(function () {
    // Route::get('/create',[
    //     'as'=> 'categories.create',
    //     'uses' => 'CategoryController@create'
    // ]);
    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('index', [CategoryController::class, 'index'])->name('categories.index');
});