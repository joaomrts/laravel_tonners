<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cilindro;
use App\Models\ComprasCilindros;
use App\Http\Requests\StoreUpdateComprasCilindros;
use PDF;

class ComprasCilindrosController extends Controller
{
    public function cadastroCompraCilindro($id) {

        $cilindro = Cilindro::find($id);

        $comprasCilindros = ComprasCilindros::where('cilindro_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate();

        $cilindros = ComprasCilindros::select('qtde','valor_total')->where('cilindro_id', $id);

        $total_qtde = $cilindros->sum('qtde');

        $total_valor = $cilindros->sum('valor_total');

        return view('comprasCilindro.cadastroCompraCilindro', compact('cilindro', 'comprasCilindros', 'cilindros', 'total_valor','total_qtde'));
    }

    public function storeCompraCilindro(StoreUpdateComprasCilindros $request)
    {
        $compraCilindro = new ComprasCilindros;

        $compraCilindro->cilindro_id = $request->cilindro_id;
        $compraCilindro->fornecedor = $request->fornecedor;
        $compraCilindro->data = $request->data;
        $compraCilindro->qtde = $request->qtde;
        $valor_un =floatval($request->valor_un);
        $compraCilindro->valor_un = $valor_un;
        $compraCilindro->valor_total = $compraCilindro->qtde * $compraCilindro->valor_un;

        $compraCilindro->save();
        return redirect('/Suprimentos')->with('msg', 'Compra cadastrada com sucesso');
    }

    public function editCompraCilindro($id){

        $compraCilindro = ComprasCilindros::findOrFail($id);

        return view('comprasCilindro.editCompraCilindro', compact('compraCilindro'));
    }

    public function updateCompraCilindro(StoreUpdateComprasCilindros $request)
    {
        $data = $request->all();

        ComprasCilindros::findOrFail($request->id)->update($data);

        return redirect('/Suprimentos')->with('msg', 'Compra editada com sucesso');
    }

    public function deleteCompraCilindro($id)
    {
        ComprasCilindros::findOrFail($id)->delete();

        return redirect('/Suprimentos')->with('msg','Compra excluída com sucesso');
    }
}
