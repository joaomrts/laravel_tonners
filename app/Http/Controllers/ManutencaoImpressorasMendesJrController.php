<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ImpressorasMendesJr;
use App\Models\ManutencaoImpressorasMendesJr;
use App\Http\Requests\StoreUpdateManutencaoImpressorasMendesJr;
use PDF;


class ManutencaoImpressorasMendesJrController extends Controller
{

    public function cadastroManutencaoImpressorasMendesJr($id) {

        $impressora = ImpressorasMendesJr::find($id);

        $manutencaoimpressorasmendesjr = ManutencaoImpressorasMendesJr::where('impressoramendesjr_id', $id)
                        ->orderBy('data', 'asc')
                        ->paginate();

        $impressoras = ManutencaoImpressorasMendesJr::select('valor')->where('impressoramendesjr_id', $id);

        $total_qtde = $impressoras->count('id');

        $total_valor = $impressoras->sum('valor');

        return view('manutencaoImpressorasMendesJr.cadastroManutencaoImpressora', compact('manutencaoimpressorasmendesjr', 'impressora', 'total_qtde', 'total_valor'));
    }

    public function storeManutencaoImpressorasMendesJr(StoreUpdateManutencaoImpressorasMendesJr $request)
    {
        $manutencaoImpressoraMendesJr = new ManutencaoImpressorasMendesJr;

        $manutencaoImpressoraMendesJr->impressoraMendesJr_id = $request->impressoraMendesJr_id;
        $manutencaoImpressoraMendesJr->modelo = $request->modelo;
        $manutencaoImpressoraMendesJr->responsavel = $request->responsavel;
        $manutencaoImpressoraMendesJr->data = $request->data;
        $manutencaoImpressoraMendesJr->descricao = $request->descricao;
        $manutencaoImpressoraMendesJr->valor = $request->valor;

        $url = '/Impressoras/manutencao/MendesJr/' . $manutencaoImpressoraMendesJr->impressoraMendesJr_id;

        $manutencaoImpressoraMendesJr->save();
        return redirect($url)->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencaoImpressorasMendesJr($id){

        $manutencaoImpressorasMendesJr = ManutencaoImpressorasMendesJr::findOrFail($id);

        $url = '/Impressoras/manutencao/MendesJr/' . $manutencaoImpressorasMendesJr->impressoraMendesJr_id;

        return view('manutencaoImpressorasMendesJr.editManutencaoImpressora', compact('manutencaoImpressorasMendesJr', 'url'));
    }

    public function updateManutencaoImpressorasMendesJr(StoreUpdateManutencaoImpressorasMendesJr $request)
    {
        $data = $request->all();

        $manutencao = ManutencaoImpressorasMendesJr::findOrFail($request->id);

        $url = '/Impressoras/manutencao/MendesJr/' . $manutencao->impressoraMendesJr_id;

        $manutencao->update($data);

        return redirect($url)->with('msg', 'Manutencao editada com sucesso');
    }

    public function deleteManutencaoImpressorasMendesJr($id)
    {
        $manutencao = ManutencaoImpressorasMendesJr::findOrFail($id);

        $url = '/Impressoras/manutencao/MendesJr/' . $manutencao->impressoraMendesJr_id;

        $manutencao->delete();

        return redirect($url)->with('msg','Manutencao excluída com sucesso');
    }
}
