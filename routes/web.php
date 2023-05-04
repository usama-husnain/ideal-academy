<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionModelController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FeeController;
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

Route::resource('question', QuestionModelController::class, ['parameters' => ['question' => 'questionModel']]);
Route::get('/test/finalize/{id}', [TestController::class, 'get_finalize'])->name('test.get_finalize');
Route::post('/test/finalize', [TestController::class, 'finalize'])->name('test.finalize');
Route::get('/test/print/{id}', [TestController::class, 'print'])->name('test.print');
Route::resource('test', TestController::class);
Route::get('/notes/print/{id}', [NotesController::class, 'print'])->name('notes.print');
Route::resource('notes', NotesController::class);
Route::resource('setting', SettingController::class);
Route::resource('students', StudentController::class);
Route::get('/fee/print/{id}', [FeeController::class, 'print'])->name('fee.print');
Route::get('/fee/collection',[FeeController::class, 'collection'])->name('fee.collection');
Route::resource('fee',FeeController::class);
