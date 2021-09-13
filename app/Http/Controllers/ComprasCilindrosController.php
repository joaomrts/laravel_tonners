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
        $compraCilindro->modelo = $request->modelo;
        $compraCilindro->fornecedor = $request->fornecedor;
        $compraCilindro->data = $request->data;
        $compraCilindro->qtde = $request->qtde;
        $valor_un =floatval($request->valor_un);
        $compraCilindro->valor_un = $valor_un;
        $compraCilindro->valor_total = $compraCilindro->qtde * $compraCilindro->valor_un;

        $url = '/Suprimentos/compraCilindro/' . $compraCilindro->cilindro_id;

        $compraCilindro->save();
        return redirect($url)->with('msg', 'Compra cadastrada com sucesso');
    }

    public function editCompraCilindro($id){

        $compraCilindro = ComprasCilindros::findOrFail($id);

        $url = '/Suprimentos/compraCilindro/' . $compraCilindro->cilindro_id;

        return view('comprasCilindro.editCompraCIlindro', compact('compraCilindro', 'url'));
    }

    public function updateCompraCilindro(StoreUpdateComprasCilindros $request)
    {
        $data = $request->all();

        $compraCilindro = ComprasCilindros::findOrFail($request->id);

        $url = '/Suprimentos/compraCilindro/' . $compraCilindro->cilindro_id;

        $compraCilindro->update($data);

        return redirect($url)->with('msg', 'Compra editada com sucesso');
    }

    public function deleteCompraCilindro($id)
    {
        $compraCilindro = ComprasCilindros::findOrFail($id);

        $url = '/Suprimentos/compraCilindro/' .$compraCilindro->cilindro_id;

        $compraCilindro->delete();

        return redirect($url)->with('msg','Compra excluída com sucesso');
    }
}
