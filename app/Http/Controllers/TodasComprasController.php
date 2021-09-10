<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tonner;
use App\Models\Compras;
use App\Models\ComprasTintas;
use App\Models\ComprasCilindros;

class TodasComprasController extends Controller
{
    public function compras()
    {

        $tonners = Compras::select('compras.*')
                   ->orderBy('data', 'desc')
                   ->paginate(30);

        $tintas = ComprasTintas::select('comprastintas.*')
                  ->orderBy('data', 'asc')
                  ->paginate(30);

        $cilindros = ComprasCilindros::select('comprascilindros.*')
                     ->orderBy('data', 'asc')
                     ->paginate(30);


        $qtdeTonners = $tonners->sum('qtde');

        $qtdeTintas = $tintas->sum('qtde');

        $qtdeCilindros = $cilindros->sum('qtde');


        $valorTonners = $tonners->sum('valor_total');

        $valorTintas = $tintas->sum('valor_total');

        $valorCilindros = $cilindros->sum('valor_total');



        $valorTotal = $valorTonners + $valorTintas + $valorCilindros;
        $qtdeTotal = $qtdeTonners + $qtdeTintas + $qtdeCilindros;


        return view('compra.todasCompras', compact('tonners', 'tintas', 'cilindros', 'qtdeTonners', 'qtdeTintas', 'qtdeCilindros', 'valorTonners', 'valorTintas', 'valorCilindros', 'valorTotal', 'qtdeTotal'));
    }
}
