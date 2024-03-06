<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/books-ajax', [BookController::class,'store']);
Route::get('/books-ajax', [BookController::class,'index']);
Route::get('/books-ajax/{book}', [BookController::class,'show']);
Route::put('/books-ajax/{book}', [BookController::class,'update']);
Route::delete('/books-ajax/{book}', [BookController::class,'destroy']);