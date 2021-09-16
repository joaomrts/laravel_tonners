<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ManutencaoImpressoras;
use App\Models\ManutencaoImpressorasXavantes;
use App\Models\ManutencaoImpressorasMendesJr;


class TodasManutencoesController extends Controller
{
    public function manutencaoimp()
    {

        $manutencaos = ManutencaoImpressoras::select('manutencaoimpressoras.*')
                   ->orderBy('data', 'desc')
                   ->paginate(30);

        $xavantes = ManutencaoImpressorasXavantes::select('manutencaoimpressorasxavantes.*')
                  ->orderBy('data', 'desc')
                  ->paginate(30);

        $mendesjrs = ManutencaoImpressorasMendesJr::select('manutencaoimpressorasmendesjr.*')
                     ->orderBy('data', 'desc')
                     ->paginate(30);

        $qtdeMG = $manutencaos->count('id');
        $qtdeX = $xavantes->count('id');
        $qtdeMJr = $mendesjrs->count('id');

        $valorMG = $manutencaos->sum('valor');
        $valorX = $xavantes->sum('valor');
        $valorMJr = $mendesjrs->sum('valor');


        $qtde = $qtdeMG + $qtdeX + $qtdeMJr;
        $valor = $valorMG + $valorX + $valorMJr;

        return view('manutencao.todasManutencoes', compact('manutencaos', 'xavantes', 'mendesjrs', 'qtdeMG', 'qtdeX', 'qtdeMJr', 'valorMG', 'valorX', 'valorMJr', 'qtde', 'valor'));
    }


    public function manutencaoImprimir()
    {
        $manutencaos = ManutencaoImpressoras::select('manutencaoimpressoras.*')
                   ->orderBy('data', 'desc')
                   ->paginate(30);

        $xavantes = ManutencaoImpressorasXavantes::select('manutencaoimpressorasxavantes.*')
                  ->orderBy('data', 'desc')
                  ->paginate(30);

        $mendesjrs = ManutencaoImpressorasMendesJr::select('manutencaoimpressorasmendesjr.*')
                     ->orderBy('data', 'desc')
                     ->paginate(30);

        $qtdeMG = $manutencaos->count('id');
        $qtdeX = $xavantes->count('id');
        $qtdeMJr = $mendesjrs->count('id');

        $valorMG = $manutencaos->sum('valor');
        $valorX = $xavantes->sum('valor');
        $valorMJr = $mendesjrs->sum('valor');


        $qtde = $qtdeMG + $qtdeX + $qtdeMJr;
        $valor = $valorMG + $valorX + $valorMJr;

        return view('manutencao.imprimirImpressora', compact('manutencaos', 'xavantes', 'mendesjrs', 'qtdeMG', 'qtdeX', 'qtdeMJr', 'valorMG', 'valorX', 'valorMJr', 'qtde', 'valor'));
    }

    public function deleteManutencaoMG($id)
    {
        ManutencaoImpressoras::findOrFail($id)->delete();

        return redirect('/Impressoras/manutencao')->with('msg', 'Compra excluída com sucesso');
    }

    public function deleteManutencaoX($id)
    {
        ManutencaoImpressorasXavantes::findOrFail($id)->delete();

        return redirect('/Impressoras/manutencao')->with('msg', 'Compra excluída com sucesso');
    }

    public function deleteManutencaoMJr($id)
    {
        ManutencaoImpressorasMendesJr::findOrFail($id)->delete();

        return redirect('/Impressoras/manutencao')->with('msg', 'Compra excluída com sucesso');
    }
}
