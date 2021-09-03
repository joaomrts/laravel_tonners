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
        $compraTinta->fornecedor = $request->fornecedor;
        $compraTinta->data = $request->data;
        $compraTinta->qtde = $request->qtde;
        $valor_un =floatval($request->valor_un);
        $compraTinta->valor_un = $valor_un;
        $compraTinta->valor_total = $compraTinta->qtde * $compraTinta->valor_un;

        $compraTinta->save();
        return redirect('/Suprimentos')->with('msg', 'Compra cadastrada com sucesso');
    }

    public function editCompraTinta($id){

        $compraTinta = Compras::findOrFail($id);

        return view('comprasTinta.editCompraTinta', ['compraTinta' => $compraTinta]);
    }

    public function updateCompraTinta(StoreUpdateComprasTintas $request)
    {
        $data = $request->all();

        ComprasTintas::findOrFail($request->id)->update($data);

        return redirect('/Suprimentos')->with('msg', 'Compra editada com sucesso');
    }

    public function deleteCompraTinta($id)
    {
        ComprasTintas::findOrFail($id)->delete();

        return redirect('/Suprimentos')->with('msg','Compra excluída com sucesso');
    }
}
