<?php

use App\Http\Controllers\NFeController;
use App\Http\Controllers\NotaController;
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

Route::get('/', [NFeController::class, 'index'])->name('nfe');
 
Route::post('nfe.upload', [NFeController::class, 'upload'])->name('nfe.upload');
Route::get('nfe', [NFeController::class, 'index'])->name('nfe');
Route::get('/lista', [NFeController::class, 'nfe'])->name('nfe.lista');

Route::post('/nota', [NotaController::class, 'index'])->name('nota');
Route::post('/nota/show', [NotaController::class, 'show'])->name('nota.show');