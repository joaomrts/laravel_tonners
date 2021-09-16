<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Manutencao;

class ManutencoesEquipamentoController extends Controller
{
    public function manutencao()
    {
        $manutencaos = Manutencao::select('manutencao.*')
                        ->orderBy('data', 'desc')
                        ->paginate(100);

        $qtde = $manutencaos->count('id');
        $valor = $manutencaos->sum('valor');

        return view ('manutencao.todasManutencoesEquipamento', compact('manutencaos', 'qtde', 'valor'));
    }

    public function imprimir()
    {
        $manutencaos = Manutencao::select('manutencao.*')
                        ->orderBy('data', 'desc')
                        ->paginate(100);

        $qtde = $manutencaos->count('id');
        $valor = $manutencaos->sum('valor');

        return view('manutencao.imprimirEquipamento', compact('manutencaos', 'qtde', 'valor'));
    }

    public function deleteManutencaoEquipamento($id)
    {
        Manutencao::findOrFail($id)->delete();

        return redirect ('/manutencao')->with('msg', 'Manutenção excluída com sucesso');
    }
}
