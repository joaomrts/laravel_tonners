<?php

namespace App\Http\Controllers;

use App\Models\Tonner;
use App\Models\Tinta;
use App\Models\Cilindro;
use App\Http\Requests\StoreUpdateTonner;
use PDF;

use Illuminate\Http\Request;

class TonnerController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $tonners = Tonner::all();
        $tintas = Tinta::all();
        $cilindros = Cilindro::all();

        return view('welcome', ['tonners' => $tonners, 'tintas' => $tintas, 'cilindros' => $cilindros]);

    }

    public function cadastro()
    {
        return view('tonner.cadastro');
    }

    public function store (StoreUpdateTonner $request)
    {
        $tonner = new Tonner;

        $tonner->modelo = $request->modelo;
        $tonner->qtde_impressora = $request->qtde_impressora;
        $tonner->estoque = $request->estoque;

        $user = auth()->user();

        $tonner->save();
        return redirect('/')->with('msg', 'Tonner cadastrado com sucesso');
    }

    public function delete($id)
    {
        Tonner::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Tonner excluído com sucesso');
    }

    public function edit($id){

        $user = auth()->user();

        $tonner = Tonner::findOrFail($id);

        return view('tonner.edit', ['tonner' => $tonner]);
    }

    public function update(StoreUpdateTonner $request)
    {
        $data = $request->all();

        Tonner::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Tonner editado com sucesso!');
    }

    public function exportTonnerPDF() {

        $user = auth()->user();

        $tonners = Tonner::all();

        view()->share('tonners', $tonners,);
        $pdf_doc = PDF::loadView('layouts.export_tonner_pdf', $tonners);

        return $pdf_doc->download('pdf.pdf');
    }

}
