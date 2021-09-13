<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Tinta;
use App\Models\ComprasTintas;
use App\Http\Requests\StoreUpdateComprasTintas;
use PDF;


class ComprasTintasController extends Controller
{
    public function cadastroCompraTinta($id) {

        $tinta = Tinta::find($id);

        $comprasTintas = ComprasTintas::where('tinta_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate();

        $tintas = ComprasTintas::select('qtde','valor_total')->where('tinta_id', $id);

        $total_qtde = $tintas->sum('qtde');

        $total_valor = $tintas->sum('valor_total');

        return view('comprasTinta.cadastroCompraTinta', compact('tinta', 'comprasTintas', 'tintas', 'total_valor','total_qtde'));
    }

    public function storeCompraTinta(StoreUpdateComprasTintas $request)
    {
        $compraTinta = new ComprasTintas;

        $compraTinta->tinta_id = $request->tinta_id;
        $compraTinta->modelo = $request->modelo;
        $compraTinta->fornecedor = $request->fornecedor;
        $compraTinta->data = $request->data;
        $compraTinta->qtde = $request->qtde;
        $valor_un =floatval($request->valor_un);
        $compraTinta->valor_un = $valor_un;
        $compraTinta->valor_total = $compraTinta->qtde * $compraTinta->valor_un;

        $url = 'Suprimentos/compraTinta/' . $compraTinta->tinta_id;

        $compraTinta->save();
        return redirect($url)->with('msg', 'Compra cadastrada com sucesso');
    }

    public function editCompraTinta($id){

        $compraTinta = ComprasTintas::findOrFail($id);

        $url = '/Suprimentos/compraTinta/' . $compraTinta->tinta_id;

        return view('comprasTinta.editCompraTinta', compact('compraTinta', 'url'));
    }

    public function updateCompraTinta(StoreUpdateComprasTintas $request)
    {
        $data = $request->all();

        $compraTinta = ComprasTintas::findOrFail($request->id);

        $url = '/Suprimentos/compraTinta/' . $compraTinta->tinta_id;

        $compraTinta->update($data);

        return redirect($url)->with('msg', 'Compra editada com sucesso');
    }

    public function deleteCompraTinta($id)
    {
        $compraTinta = ComprasTintas::findOrFail($id);

        $url = '/Suprimentos/compraTinta/' . $compraTinta->tinta_id;

        $compraTinta->delete();

        return redirect($url)->with('msg','Compra excluída com sucesso');
    }
}

