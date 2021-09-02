<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Manutencao;
use App\Http\Requests\StoreUpdateManutencao;
use PDF;

use Illuminate\Http\Request;

class ManutencaoController extends Controller
{

    public function cadastroManutencao($id) {

        $equipamento = Equipamento::find($id);

        $manutencaos = Manutencao::where('equipamento_id', $id)
                        ->orderBy('responsavel', 'asc')
                        ->paginate();

        return view('manutencao.cadastroManutencao', ['manutencaos' => $manutencaos, 'equipamento' => $equipamento]);
    }

    public function storeManutencao(StoreUpdateManutencao $request)
    {
        $manutencao = new Manutencao;

        $manutencao->equipamento_id = $request->equipamento_id;
        $manutencao->responsavel = $request->responsavel;
        $manutencao->data = $request->data;
        $manutencao->tipo = $request->tipo;
        $manutencao->servico = $request->servico;
        $manutencao->descricao = $request->descricao;

        $manutencao->save();
        return redirect('/')->with('msg', 'Manutenção cadastrada com sucesso');
    }

    public function editManutencao($id){

        $manutencao = Manutencao::findOrFail($id);

        return view('manutencao.editManutencao', ['manutencao' => $manutencao]);
    }

    public function updateManutencao(StoreUpdateManutencao $request)
    {
        $data = $request->all();

        Manutencao::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Manutencao editada com sucesso');
    }

    public function deleteManutencao($id)
    {
        Manutencao::findOrFail($id)->delete();

        return redirect('/')->with('msg','Manutencao excluída com sucesso');
    }

}
