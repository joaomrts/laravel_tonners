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
Route::get('/edit/{id}', [TonnerController::class, 'edit'])->middleware('auth');
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
