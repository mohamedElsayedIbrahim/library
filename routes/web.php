<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;




Route::middleware('lang')->group(function(){
    Route::get('/', function () {
        return view('index');
    })->name('Home');

    Route::get('/books',[BookController::class,'index'])->name('books.index');
Route::get('/books/show/{id}',[BookController::class,'show'])->name('books.show');




Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/show/{id}',[CategoryController::class,'show'])->name('categories.show');


Route::post('/handel/register',[AuthController::class,'handelRegister'])->name('Auth.handel.register');

Route::middleware('is.guest')->group(function(){

    Route::get('/register',[AuthController::class,'register'])->name('Auth.register');
    

    Route::get('/login',[AuthController::class,'login'])->name('Auth.login');
    Route::post('/handel/login',[AuthController::class,'handelLogin'])->name('Auth.handel.login');

    Route::get('login/github', [AuthController::class, 'redirectToProvider'])->name('login.github');
    Route::get('login/github/callback', [AuthController::class,'handleProviderCallback']);

});



Route::middleware('is.admin')->group(function(){
    Route::get('/books/new',[BookController::class,'add'])->name('books.add');
    Route::post('/books/store',[BookController::class,'store'])->name('books.store');

    Route::get('/books/edit/{id}',[BookController::class,'edit'])->name('books.edit');
    Route::post('/books/update/{id}',[BookController::class,'update'])->name('books.update');

    Route::get('/books/delete/{id}',[BookController::class,'destory'])->name('books.destory');

    Route::get('/categories/new',[CategoryController::class,'add'])->name('categories.add');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

    Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');

    Route::get('/categories/delete/{id}',[CategoryController::class,'destory'])->name('categories.destory');

    
});

Route::middleware('is.auth')->group(function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('Auth.logout');
});

});


Route::get('/lang/en',[LangController::class,'en'])->name('Lang.en');
Route::get('/lang/ar',[LangController::class,'ar'])->name('Lang.ar');