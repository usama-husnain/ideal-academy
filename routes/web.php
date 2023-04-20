<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionModelController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\NotesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('question', QuestionModelController::class);
Route::get('/test/finalize/{id}', [TestController::class, 'get_finalize'])->name('test.get_finalize');
Route::post('/test/finalize', [TestController::class, 'finalize'])->name('test.finalize');
Route::get('/test/print/{id}', [TestController::class, 'print'])->name('test.print');
Route::resource('test', TestController::class);
Route::get('/notes/print/{id}', [NotesController::class, 'print'])->name('notes.print');
Route::resource('notes', NotesController::class);
Route::get('/fee', function () {
    return view('admin.fee.index');
});
