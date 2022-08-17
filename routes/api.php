<?php

use App\Http\Controllers\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/books',[ApiBookController::class,'index']);
Route::get('/books/show/{id}',[ApiBookController::class,'show']);
Route::get('/books/delete/{id}',[ApiBookController::class,'destory']);
Route::post('/books/store',[ApiBookController::class,'store']);
