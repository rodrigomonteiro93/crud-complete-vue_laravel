<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/thought', [App\Http\Controllers\ThoughtController::class, 'index'])->name('thought');
Route::post('/thought', [App\Http\Controllers\ThoughtController::class, 'store'])->name('thought.store');
Route::put('/thought/{id}', [App\Http\Controllers\ThoughtController::class, 'update'])->name('thought.update');
Route::delete('/thought/{id}', [App\Http\Controllers\ThoughtController::class, 'delete'])->name('thought.delete');

