<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tinta;
use App\Models\Cilindro;
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
                  ->orderBy('data', 'desc')
                  ->paginate(30);

        $cilindros = ComprasCilindros::select('comprascilindros.*')
                     ->orderBy('data', 'desc')
                     ->paginate(30);

        $compraTonner = $tonners->count('id');

        $compraTinta = $tintas->count('id');

        $compraCilindro = $cilindros->count('id');


        $qtdeTonners = $tonners->sum('qtde');

        $qtdeTintas = $tintas->sum('qtde');

        $qtdeCilindros = $cilindros->sum('qtde');


        $valorTonners = $tonners->sum('valor_total');

        $valorTintas = $tintas->sum('valor_total');

        $valorCilindros = $cilindros->sum('valor_total');


        $compraTotal = $compraTonner + $compraTinta + $compraCilindro;
        $itensTotal = $qtdeTonners + $qtdeTintas + $qtdeCilindros;
        $valorTotal = $valorTonners + $valorTintas + $valorCilindros;
        $media = $valorTotal / $compraTotal;



        return view('compra.todasCompras', compact('tonners', 'tintas', 'cilindros', 'qtdeTonners', 'qtdeTintas', 'qtdeCilindros', 'valorTonners', 'valorTintas', 'valorCilindros', 'valorTotal', 'compraTotal', 'itensTotal', 'media'));
    }

    public function showCompras()
    {
        $tonners = Compras::all();

        $tintas = ComprasTintas::all();

        $cilindros = ComprasCilindros::all();


        $compraTonner = $tonners->count('id');

        $compraTinta = $tintas->count('id');

        $compraCilindro = $cilindros->count('id');


        $qtdeTonners = $tonners->sum('qtde');

        $qtdeTintas = $tintas->sum('qtde');

        $qtdeCilindros = $cilindros->sum('qtde');


        $valorTonners = $tonners->sum('valor_total');

        $valorTintas = $tintas->sum('valor_total');

        $valorCilindros = $cilindros->sum('valor_total');


        $compraTotal = $compraTonner + $compraTinta + $compraCilindro;
        $itensTotal = $qtdeTonners + $qtdeTintas + $qtdeCilindros;
        $valorTotal = $valorTonners + $valorTintas + $valorCilindros;
        $media = $valorTotal / $compraTotal;



        return view('compra.showCompras', compact('tonners', 'tintas', 'cilindros', 'qtdeTonners', 'qtdeTintas', 'qtdeCilindros', 'valorTonners', 'valorTintas', 'valorCilindros', 'valorTotal', 'compraTotal', 'itensTotal', 'media'));
    }

    public function deleteCompras($id)
    {
        Compras::findOrFail($id)->delete();

        return redirect('Suprimentos/compras')->with('msg', 'Compra exclu??da com sucesso');
    }

    public function deleteComprasTintas($id)
    {
        ComprasTintas::findOrFail($id)->delete();

        return redirect('Suprimentos/compras')->with('msg', 'Compra exclu??da com sucesso');
    }

    public function deleteComprasCilindros($id)
    {
        ComprasCilindros::findOrFail($id)->delete();

        return redirect('Suprimentos/compras')->with('msg', 'Compra exclu??da com sucesso');
    }

}
