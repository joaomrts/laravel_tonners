<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TonnerController;
use App\Http\Controllers\TintaController;
use App\Http\Controllers\CilindroController;

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

Route::get('/showTonner', [TonnerController::class, 'showTonner']);
Route::get('tonner/create-pdf', [TonnerController::class, 'exportTonnerPDF']);
Route::delete('/{id}', [TonnerController::class, 'delete']);
Route::get('/', [TonnerController::class, 'index']);
Route::get('/cadastro', [TonnerController::class, 'cadastro']);
Route::post('cadastro/salvar', [TonnerController::class, 'store']);
Route::get('/edit/{id}', [TonnerController::class, 'edit']);
Route::put('/edit/update/{id}', [TonnerController::class, 'update']);


Route::get('/showTinta', [TintaController::class, 'showTinta']);
Route::get('tinta/create-pdf', [TintaController::class, 'exportTintaPDF']);
Route::get('/cadastroTinta', [TintaController::class, 'cadastroTinta']);
Route::post('cadastroTinta/salvar', [TintaController::class, 'storeTinta']);
Route::delete('/deleteTinta/{id}', [TintaController::class, 'deleteTinta']);
Route::get('/editTinta/{id}', [TintaController::class, 'editTinta']);
Route::put('/editTinta/update/{id}', [TintaController::class, 'updateTinta']);


Route::get('/showCilindro', [CilindroController::class, 'showCilindro']);
Route::get('cilindro/create-pdf', [CilindroController::class, 'exportCilindroPDF']);
Route::get('/cadastroCilindro', [CilindroController::class, 'cadastroCilindro']);
Route::post('cadastroCilindro/salvar', [CilindroController::class, 'storeCilindro']);
Route::delete('/deleteCilindro/{id}', [CilindroController::class, 'deleteCilindro']);
Route::get('/editCilindro/{id}', [CilindroController::class, 'editCilindro']);
Route::put('/editCilindro/update/{id}', [CilindroController::class, 'updateCilindro']);


