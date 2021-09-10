<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ImpressorasXavantes;
use App\Models\ManutencaoImpressorasXavantes;
use App\Http\Requests\StoreUpdateManutencaoImpressorasXavantes;
use PDF;


class ManutencaoImpressorasXavantesController extends Controller
{

    public function cadastroManutencaoImpressorasXavantes($id) {

        $impressora = ImpressorasXavantes::find($id);

        $manutencaoimpressorasxavantes = ManutencaoImpressorasXavantes::where('impressoraXavantes_id', $id)
                        ->orderBy('data', 'asc')
                        ->paginate();

        $impressoras = ManutencaoImpressorasXavantes::select('valor')->where('impressoraXavantes_id', $id);

        $total_qtde = $impressoras->count('id');

        $total_valor = $impressoras->sum('valor');

        return view('manutencaoImpressorasXavantes.cadastroManutencaoImpressora', compact('manutencaoimpressorasxavantes', 'impressora', 'total_qtde', 'total_valor'));
    }

    public function storeManutencaoImpressorasXavantes(StoreUpdateManutencaoImpressorasXavantes $request)
    {
        $manutencaoImpressoraXavantes = new ManutencaoImpressorasXavantes;

        $manutencaoImpressoraXavantes->impressoraXavantes_id = $request->impressoraXavantes_id;
        $manutencaoImpressoraXavantes->responsavel = $request->responsavel;
        $manutencaoImpressoraXavantes->data = $request->data;
        $manutencaoImpressoraXavantes->defeito = $request->defeito;
        $manutencaoImpressoraXavantes->valor = $request->valor;

        $url = 'cadastroManutencaoImpressorasXavantes/' . $manutencaoImpressoraXavantes->impressoraXavantes_id;

        $manutencaoImpressoraXavantes->save();

        return redirect($url)->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencaoImpressorasXavantes($id){

        $manutencaoImpressorasXavantes = ManutencaoImpressorasXavantes::findOrFail($id);

        $url = '/cadastroManutencaoImpressorasXavantes/' . $manutencaoImpressorasXavantes->impressoraXavantes_id;

        return view('manutencaoImpressorasXavantes.editManutencaoImpressora', compact('manutencaoImpressorasXavantes', 'url'));
    }

    public function updateManutencaoImpressorasXavantes(StoreUpdateManutencaoImpressorasXavantes $request)
    {
        $data = $request->all();

        $manutencao = ManutencaoImpressorasXavantes::findOrFail($request->id);

        $url = '/cadastroManutencaoImpressorasXavantes/' . $manutencao->impressoraXavantes_id;

        $manutencao->update($data);

        return redirect($url)->with('msg', 'Manutencao editada com sucesso');
    }

    public function deleteManutencaoImpressorasXavantes($id)
    {
        $manutencao = ManutencaoImpressorasXavantes::findOrFail($id);

        $url = '/cadastroManutencaoImpressorasXavantes/' . $manutencao->impressoraXavantes_id;

        $manutencao->delete();

        return redirect($url)->with('msg','Manutencao excluída com sucesso');
    }
}
