<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TonnerController;
use App\Http\Controllers\TintaController;
use App\Http\Controllers\CilindroController;
use App\Http\Controllers\ImpressoraController;
use App\Http\Controllers\ImpressorasXavantesController;
use App\Http\Controllers\ImpressorasMendesJrController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ComprasTintasController;
use App\Http\Controllers\ComprasCilindrosController;
use App\Http\Controllers\ManutencaoImpressorasController;
use App\Http\Controllers\ManutencaoImpressorasXavantesController;
use App\Http\Controllers\ManutencaoImpressorasMendesJrController;
use App\Http\Controllers\TodasComprasController;


if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


Route::any('/Suprimentos', [TonnerController::class,'searchTonner']);
Route::get('/showTonner', [TonnerController::class, 'showTonner'])->middleware('auth');
Route::get('tonner/create-pdf', [TonnerController::class, 'exportTonnerPDF'])->middleware('auth');
Route::delete('/{id}', [TonnerController::class, 'delete'])->middleware('auth');
Route::get('/Suprimentos', [TonnerController::class, 'indexTonner'])->middleware('auth');
Route::get('/cadastro', [TonnerController::class, 'cadastro'])->middleware('auth');
Route::post('cadastro/salvar', [TonnerController::class, 'store'])->middleware('auth');
Route::get('Suprimentos/edit/{id}', [TonnerController::class, 'edit'])->middleware('auth');
Route::put('/edit/update/{id}', [TonnerController::class, 'update'])->middleware('auth');


Route::get('/showTinta', [TintaController::class, 'showTinta'])->middleware('auth');
Route::get('tinta/create-pdf', [TintaController::class, 'exportTintaPDF'])->middleware('auth');
Route::get('/cadastroTinta', [TintaController::class, 'cadastroTinta'])->middleware('auth');
Route::post('cadastroTinta/salvar', [TintaController::class, 'storeTinta'])->middleware('auth');
Route::delete('/deleteTinta/{id}', [TintaController::class, 'deleteTinta'])->middleware('auth');
Route::get('/editTinta/{id}', [TintaController::class, 'editTinta'])->middleware('auth');
Route::put('/editTinta/update/{id}', [TintaController::class, 'updateTinta'])->middleware('auth');


Route::get('/showCilindro', [CilindroController::class, 'showCilindro'])->middleware('auth');
Route::get('cilindro/create-pdf', [CilindroController::class, 'exportCilindroPDF'])->middleware('auth');
Route::get('/cadastroCilindro', [CilindroController::class, 'cadastroCilindro'])->middleware('auth');
Route::post('cadastroCilindro/salvar', [CilindroController::class, 'storeCilindro'])->middleware('auth');
Route::delete('/deleteCilindro/{id}', [CilindroController::class, 'deleteCilindro'])->middleware('auth');
Route::get('/editCilindro/{id}', [CilindroController::class, 'editCilindro'])->middleware('auth');
Route::put('/editCilindro/update/{id}', [CilindroController::class, 'updateCilindro'])->middleware('auth');


Route::any('/Impressoras', [ImpressoraController::class,'search']);
Route::get('/showImpressora', [ImpressoraController::class, 'showImpressora'])->middleware('auth');
Route::get('impressora/create-pdf', [ImpressoraController::class, 'exportImpressoraPDF'])->middleware('auth');
Route::get('/cadastroImpressora', [ImpressoraController::class, 'cadastroImpressora'])->middleware('auth');
Route::get('/Impressoras', [ImpressoraController::class, 'indexImpressora'])->middleware('auth');
Route::post('cadastroImpressora/salvar', [ImpressoraController::class, 'storeImpressora'])->middleware('auth');
Route::delete('/deleteImpressora/{id}', [ImpressoraController::class, 'deleteImpressora'])->middleware('auth');
Route::get('/editImpressora/{id}', [ImpressoraController::class, 'editImpressora'])->middleware('auth');
Route::put('/editImpressora/update/{id}', [ImpressoraController::class, 'updateImpressora'])->middleware('auth');


Route::get('/showImpressorasXavantes', [ImpressorasXavantesController::class, 'showImpressorasXavantes'])->middleware('auth');
Route::get('impressorasXavantes/create-pdf', [ImpressorasXavantesController::class, 'exportImpressorasXavantesPDF'])->middleware('auth');
Route::get('/cadastroImpressorasXavantes', [ImpressorasXavantesController::class, 'cadastroImpressorasXavantes'])->middleware('auth');
Route::get('/indexImpressorasXavantes', [ImpressorasXavantesController::class, 'indexImpressorasXavantes'])->middleware('auth');
Route::post('cadastroImpressorasXavantes/salvar', [ImpressorasXavantesController::class, 'storeImpressorasXavantes'])->middleware('auth');
Route::delete('/deleteImpressorasXavantes/{id}', [ImpressorasXavantesController::class, 'deleteImpressorasXavantes'])->middleware('auth');
Route::get('/editImpressorasXavantes/{id}', [ImpressorasXavantesController::class, 'editImpressorasXavantes'])->middleware('auth');
Route::put('/editImpressorasXavantes/update/{id}', [ImpressorasXavantesController::class, 'updateImpressorasXavantes'])->middleware('auth');


Route::get('/showImpressorasMendesJr', [ImpressorasMendesJrController::class, 'showImpressorasMendesJr'])->middleware('auth');
Route::get('impressorasMendesJr/create-pdf', [ImpressorasMendesJrController::class, 'exportImpressorasMendesJrPDF'])->middleware('auth');
Route::get('/cadastroImpressorasMendesJr', [ImpressorasMendesJrController::class, 'cadastroImpressorasMendesJr'])->middleware('auth');
Route::get('/indexImpressorasMendesJr', [ImpressorasMendesJrController::class, 'indexImpressorasMendesJr'])->middleware('auth');
Route::post('cadastroImpressorasMendesJr/salvar', [ImpressorasMendesJrController::class, 'storeImpressorasMendesJr'])->middleware('auth');
Route::delete('/deleteImpressorasMendesJr/{id}', [ImpressorasMendesJrController::class, 'deleteImpressorasMendesJr'])->middleware('auth');
Route::get('/editImpressorasMendesJr/{id}', [ImpressorasMendesJrController::class, 'editImpressorasMendesJr'])->middleware('auth');
Route::put('/editImpressorasMendesJr/update/{id}', [ImpressorasMendesJrController::class, 'updateImpressorasMendesJr'])->middleware('auth');


Route::any('/search', [EquipamentoController::class,'searchEquipamento']);
Route::get('/showEquipamento', [EquipamentoController::class, 'showEquipamento'])->middleware('auth');
Route::get('equipamento/create-pdf', [EquipamentoController::class, 'exportEquipamentoPDF'])->middleware('auth');
Route::get('/cadastroEquipamento', [EquipamentoController::class, 'cadastroEquipamento'])->middleware('auth');
Route::get('/', [EquipamentoController::class, 'indexEquipamento'])->middleware('auth')->middleware('auth');
Route::post('cadastroEquipamento/salvar', [EquipamentoController::class, 'storeEquipamento'])->middleware('auth');
Route::delete('/deleteEquipamento/{id}', [EquipamentoController::class, 'deleteEquipamento'])->middleware('auth');
Route::get('/editEquipamento/{id}', [EquipamentoController::class, 'editEquipamento'])->middleware('auth');
Route::put('/editEquipamento/update/{id}', [EquipamentoController::class, 'updateEquipamento'])->middleware('auth');


Route::any('/Office', [OfficeController::class,'searchOffice']);
Route::get('/showOffice', [OfficeController::class, 'showOffice'])->middleware('auth');
Route::get('office/create-pdf', [OfficeController::class, 'exportOfficePDF'])->middleware('auth');
Route::get('/cadastroOffice', [OfficeController::class, 'cadastroOffice'])->middleware('auth');
Route::get('/Office', [OfficeController::class, 'indexOffice'])->middleware('auth')->middleware('auth');
Route::post('cadastroOffice/salvar', [OfficeController::class, 'storeOffice'])->middleware('auth');
Route::delete('/deleteOffice/{id}', [OfficeController::class, 'deleteOffice'])->middleware('auth');
Route::get('/editOffice/{id}', [OfficeController::class, 'editOffice'])->middleware('auth');
Route::put('/editOffice/update/{id}', [OfficeController::class, 'updateOffice'])->middleware('auth');


Route::get('/cadastroManutencao/{id}', [ManutencaoController::class, 'cadastroManutencao'])->middleware('auth');
Route::post('cadastroManutencao/salvar', [ManutencaoController::class, 'storeManutencao'])->middleware('auth');
Route::delete('/deleteManutencao/{id}', [ManutencaoController::class, 'deleteManutencao'])->middleware('auth');
Route::get('/editManutencao/{id}', [ManutencaoController::class, 'editManutencao'])->middleware('auth');
Route::put('/editManutencao/update/{id}', [ManutencaoController::class, 'updateManutencao'])->middleware('auth');


Route::get('Suprimentos/compra/{id}', [ComprasController::class, 'cadastroCompra'])->name('auth');
Route::post('cadastroCompra/salvar', [ComprasController::class, 'storeCompra'])->middleware('auth');
Route::delete('/deleteCompra/{id}', [ComprasController::class, 'deleteCompra'])->middleware('auth');
Route::get('/editCompra/{id}', [ComprasController::class, 'editCompra'])->middleware('auth');
Route::put('/editCompra/update/{id}', [ComprasController::class, 'updateCompra'])->middleware('auth');


Route::get('Suprimentos/compraTinta/{id}', [ComprasTintasController::class, 'cadastroCompraTinta'])->middleware('auth');
Route::post('cadastroCompraTinta/salvar', [ComprasTintasController::class, 'storeCompraTinta'])->middleware('auth');
Route::delete('/deleteCompraTinta/{id}', [ComprasTintasController::class, 'deleteCompraTinta'])->middleware('auth');
Route::get('/editCompraTinta/{id}', [ComprasTintasController::class, 'editCompraTinta'])->middleware('auth');
Route::put('/editCompraTinta/update/{id}', [ComprasTintasController::class, 'updateCompraTinta'])->middleware('auth');

Route::get('Suprimentos/compraCilindro/{id}', [ComprasCilindrosController::class, 'cadastroCompraCilindro'])->middleware('auth');
Route::get('/showCompraCilindro', [ComprasCilindrosController::class, 'showCompraCilindro'])->middleware('auth');
Route::get('compraCilindro/create-pdf', [ComprasCilindrosController::class, 'exportCompraCilindroPDF'])->middleware('auth');
Route::post('cadastroCompraCilindro/salvar', [ComprasCilindrosController::class, 'storeCompraCilindro'])->middleware('auth');
Route::delete('/deleteCompraCilindro/{id}', [ComprasCilindrosController::class, 'deleteCompraCilindro'])->middleware('auth');
Route::get('/editCompraCilindro/{id}', [ComprasCilindrosController::class, 'editCompraCilindro'])->middleware('auth');
Route::put('/editCompraCilindro/update/{id}', [ComprasCilindrosController::class, 'updateCompraCilindro'])->middleware('auth');

Route::get('/cadastroManutencaoImpressora/{id}', [ManutencaoImpressorasController::class, 'cadastroManutencaoImpressora'])->middleware('auth');
Route::post('cadastroManutencaoImpressora/salvar', [ManutencaoImpressorasController::class, 'storeManutencaoImpressora'])->middleware('auth');
Route::delete('/deleteManutencaoImpressora/{id}', [ManutencaoImpressorasController::class, 'deleteManutencaoImpressora'])->middleware('auth');
Route::get('/editManutencaoImpressora/{id}', [ManutencaoImpressorasController::class, 'editManutencaoImpressora'])->middleware('auth');
Route::put('/editManutencaoImpressora/update/{id}', [ManutencaoImpressorasController::class, 'updateManutencaoImpressora'])->middleware('auth');

Route::get('/cadastroManutencaoImpressorasXavantes/{id}', [ManutencaoImpressorasXavantesController::class, 'cadastroManutencaoImpressorasXavantes'])->middleware('auth');
Route::post('cadastroManutencaoImpressorasXavantes/salvar', [ManutencaoImpressorasXavantesController::class, 'storeManutencaoImpressorasXavantes'])->middleware('auth');
Route::delete('/deleteManutencaoImpressorasXavantes/{id}', [ManutencaoImpressorasXavantesController::class, 'deleteManutencaoImpressorasXavantes'])->middleware('auth');
Route::get('/editManutencaoImpressorasXavantes/{id}', [ManutencaoImpressorasXavantesController::class, 'editManutencaoImpressorasXavantes'])->middleware('auth');
Route::put('/editManutencaoImpressorasXavantes/update/{id}', [ManutencaoImpressorasXavantesController::class, 'updateManutencaoImpressorasXavantes'])->middleware('auth');

Route::get('/cadastroManutencaoImpressorasMendesJr/{id}', [ManutencaoImpressorasMendesJrController::class, 'cadastroManutencaoImpressorasMendesJr'])->middleware('auth');
Route::post('cadastroManutencaoImpressorasMendesJr/salvar', [ManutencaoImpressorasMendesJrController::class, 'storeManutencaoImpressorasMendesJr'])->middleware('auth');
Route::delete('/deleteManutencaoImpressorasMendesJr/{id}', [ManutencaoImpressorasMendesJrController::class, 'deleteManutencaoImpressorasMendesJr'])->middleware('auth');
Route::get('/editManutencaoImpressorasMendesJr/{id}', [ManutencaoImpressorasMendesJrController::class, 'editManutencaoImpressorasMendesJr'])->middleware('auth');
Route::put('/editManutencaoImpressorasMendesJr/update/{id}', [ManutencaoImpressorasMendesJrController::class, 'updateManutencaoImpressorasMendesJr'])->middleware('auth');

Route::get('/Suprimentos/compras', [TodasComprasController::class, 'compras'])->middleware('auth');
Route::get('/Suprimentos/compras/imprimir', [TodasComprasController::class, 'showCompras'])->middleware('auth');
Route::delete('/deleteCompras/{id}', [TodasComprasController:: class, 'deleteCompras'])->middleware('auth');
Route::delete('/deleteComprasTintas/{id}', [TodasComprasController:: class, 'deleteComprasTintas'])->middleware('auth');
Route::delete('/deleteComprasCilindros/{id}', [TodasComprasController:: class, 'deleteComprasCilindros'])->middleware('auth');
