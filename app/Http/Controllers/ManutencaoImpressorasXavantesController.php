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

        $manutencaoImpressoraXavantes->save();
        return redirect('/Impressoras')->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencaoImpressorasXavantes($id){

        $manutencaoImpressorasXavantes = ManutencaoImpressorasXavantes::findOrFail($id);

        return view('manutencaoImpressorasXavantes.editManutencaoImpressora', compact('manutencaoImpressorasXavantes'));
    }

    public function updateManutencaoImpressorasXavantes(StoreUpdateManutencaoImpressorasXavantes $request)
    {
        $data = $request->all();

        ManutencaoImpressorasXavantes::findOrFail($request->id)->update($data);

        return redirect('/Impressoras')->with('msg', 'Manutencao editada com sucesso');
    }

    public function deleteManutencaoImpressorasXavantes($id)
    {
        ManutencaoImpressorasXavantes::findOrFail($id)->delete();

        return redirect('/Impressoras')->with('msg','Manutencao excluída com sucesso');
    }
}
