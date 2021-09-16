<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Impressora;
use App\Models\ManutencaoImpressoras;
use App\Http\Requests\StoreUpdateManutencaoImpressoras;
use PDF;

class ManutencaoImpressorasController extends Controller
{

    public function cadastroManutencaoImpressora($id) {

        $impressora = Impressora::find($id);

        $manutencaoimpressoras = ManutencaoImpressoras::where('impressora_id', $id)
                        ->orderBy('data', 'asc')
                        ->paginate();

        $impressoras = ManutencaoImpressoras::select('valor')->where('impressora_id', $id);

        $total_qtde = $impressoras->count('id');

        $total_valor = $impressoras->sum('valor');

        return view('manutencaoImpressora.cadastroManutencaoImpressora', compact('manutencaoimpressoras', 'impressora', 'total_qtde', 'total_valor'));
    }

    public function storeManutencaoImpressora(StoreUpdateManutencaoImpressoras $request)
    {
        $manutencaoImpressora = new ManutencaoImpressoras;

        $manutencaoImpressora->impressora_id = $request->impressora_id;
        $manutencaoImpressora->modelo = $request->modelo;
        $manutencaoImpressora->responsavel = $request->responsavel;
        $manutencaoImpressora->data = $request->data;
        $manutencaoImpressora->defeito = $request->defeito;
        $manutencaoImpressora->valor = $request->valor;

        $url = '/Impressoras/manutencao/MG/' . $manutencaoImpressora->impressora_id;

        $manutencaoImpressora->save();
        return redirect($url)->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencaoImpressora($id){

        $manutencaoImpressora = ManutencaoImpressoras::findOrFail($id);

        $url = '/Impressoras/manutencao/MG/' . $manutencaoImpressora->impressora_id;

        return view('manutencaoImpressora.editManutencaoImpressora', compact('manutencaoImpressora', 'url'));
    }

    public function updateManutencaoImpressora(StoreUpdateManutencaoImpressoras $request)
    {
        $data = $request->all();

        $manutencaoImpressora = ManutencaoImpressoras::findOrFail($request->id);

        $url = '/Impressoras/manutencao/MG/' . $manutencaoImpressora->impressora_id;

        $manutencaoImpressora->update($data);

        return redirect($url)->with('msg', 'Manutenção editada com sucesso');
    }

    public function deleteManutencaoImpressora($id)
    {
        $manutencaoImpressora = ManutencaoImpressoras::findOrFail($id);

        $url = '/Impressoras/manutencao/MG/' . $manutencaoImpressora->impressora_id;

        $manutencaoImpressora->delete();

        return redirect($url)->with('msg','Manutenção excluída com sucesso');
    }

}
