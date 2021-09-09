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

        $manutencaoimpressorasmendesjr = ManutencaoImpressorasMendesJr::where('impressoraMendesJr_id', $id)
                        ->orderBy('data', 'asc')
                        ->paginate();

        $impressoras = ManutencaoImpressorasMendesJr::select('valor')->where('impressoraMendesJr_id', $id);

        $total_qtde = $impressoras->count('id');

        $total_valor = $impressoras->sum('valor');

        return view('manutencaoImpressorasMendesJr.cadastroManutencaoImpressora', compact('manutencaoimpressorasmendesjr', 'impressora', 'total_qtde', 'total_valor'));
    }

    public function storeManutencaoImpressorasMendesJr(StoreUpdateManutencaoImpressorasMendesJr $request)
    {
        $manutencaoImpressoraMendesJr = new ManutencaoImpressorasMendesJr;

        $manutencaoImpressoraMendesJr->impressoraMendesJr_id = $request->impressoraMendesJr_id;
        $manutencaoImpressoraMendesJr->responsavel = $request->responsavel;
        $manutencaoImpressoraMendesJr->data = $request->data;
        $manutencaoImpressoraMendesJr->descricao = $request->descricao;
        $manutencaoImpressoraMendesJr->valor = $request->valor;

        $manutencaoImpressoraMendesJr->save();
        return redirect('/Impressoras')->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencaoImpressorasMendesJr($id){

        $manutencaoImpressorasMendesJr = ManutencaoImpressorasMendesJr::findOrFail($id);

        return view('manutencaoImpressorasMendesJr.editManutencaoImpressora', compact('manutencaoImpressorasMendesJr'));
    }

    public function updateManutencaoImpressorasMendesJr(StoreUpdateManutencaoImpressorasMendesJr $request)
    {
        $data = $request->all();

        ManutencaoImpressorasMendesJr::findOrFail($request->id)->update($data);

        return redirect('/Impressoras')->with('msg', 'Manutencao editada com sucesso');
    }

    public function deleteManutencaoImpressorasMendesJr($id)
    {
        ManutencaoImpressorasMendesJr::findOrFail($id)->delete();

        return redirect('/Impressoras')->with('msg','Manutencao excluída com sucesso');
    }
}