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
        $manutencaoImpressora->responsavel = $request->responsavel;
        $manutencaoImpressora->data = $request->data;
        $manutencaoImpressora->defeito = $request->defeito;
        $manutencaoImpressora->valor = $request->valor;

        $manutencaoImpressora->save();
        return redirect('/Impressoras')->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencaoImpressora($id){

        $manutencaoImpressora = ManutencaoImpressoras::findOrFail($id);

        return view('manutencaoImpressora.editManutencaoImpressora', compact('manutencaoImpressora'));
    }

    public function updateManutencaoImpressora(StoreUpdateManutencaoImpressoras $request)
    {
        $data = $request->all();

        ManutencaoImpressoras::findOrFail($request->id)->update($data);

        return redirect('/Impressoras')->with('msg', 'Manutenção editada com sucesso');
    }

    public function deleteManutencaoImpressora($id)
    {
        ManutencaoImpressoras::findOrFail($id)->delete();

        return redirect('/Impressoras')->with('msg','Manutenção excluída com sucesso');
    }

}
