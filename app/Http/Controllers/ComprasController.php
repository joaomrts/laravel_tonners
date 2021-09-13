<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Tonner;
use App\Models\Compras;
use App\Http\Requests\StoreUpdateCompras;
use PDF;


class ComprasController extends Controller
{
    public function cadastroCompra($id) {

        $tonner = Tonner::find($id);

        $compras = Compras::where('tonner_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate();

        $tonners = Compras::select('qtde','valor_total')->where('tonner_id', $id);

        $total_qtde = $tonners->sum('qtde');

        $total_valor = $tonners->sum('valor_total');

        return view('compra.cadastroCompra', compact('compras', 'tonner', 'total_valor','total_qtde'));
    }

    public function storeCompra(StoreUpdateCompras $request)
    {
        $compra = new Compras;

        $compra->tonner_id = $request->tonner_id;
        $compra->modelo = $request->modelo;
        $compra->fornecedor = $request->fornecedor;
        $compra->data = $request->data;
        $compra->qtde = $request->qtde;
        $valor_un =floatval($request->valor_un);
        $compra->valor_un = $valor_un;
        $compra->valor_total = $compra->qtde * $compra->valor_un;

        $url = 'Suprimentos/compra/' . $compra->tonner_id;

        $compra->save();
        return redirect($url)->with('msg', 'Compra cadastrada com sucesso');
    }


    public function editCompra($id){

        $compra = Compras::findOrFail($id);

        $url = '/Suprimentos/compra/' . $compra->tonner_id;

        return view('compra.editCompra', compact('compra', 'url'));
    }

    public function updateCompra(StoreUpdateCompras $request)
    {
        $data = $request->all();

        $compra = Compras::findOrFail($request->id);
        $url = 'Suprimentos/compra/' . $compra->tonner_id;
        $compra->update($data);

        return redirect($url)->with('msg', 'Compra cadastrada com sucesso');
    }

    public function deleteCompra($id)
    {
        $compra = Compras::findOrFail($id);

        $url = 'Suprimentos/compra/' . $compra->tonner_id;

        $compra->delete();

        return redirect($url)->with('msg','Compra excluída com sucesso');
    }
}
