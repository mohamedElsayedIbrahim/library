<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('index');
})->name('Home');

Route::get('/books',[BookController::class,'index'])->name('books.index');
Route::get('/books/show/{id}',[BookController::class,'show'])->name('books.show');

Route::get('/books/new',[BookController::class,'add'])->name('books.add');
Route::post('/books/store',[BookController::class,'store'])->name('books.store');

Route::get('/books/edit/{id}',[BookController::class,'edit'])->name('books.edit');
Route::post('/books/update/{id}',[BookController::class,'update'])->name('books.update');

Route::get('/books/delete/{id}',[BookController::class,'destory'])->name('books.destory');

Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/show/{id}',[CategoryController::class,'show'])->name('categories.show');

Route::get('/categories/new',[CategoryController::class,'add'])->name('categories.add');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');

Route::get('/categories/delete/{id}',[CategoryController::class,'destory'])->name('categories.destory');