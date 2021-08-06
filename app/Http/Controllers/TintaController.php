<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tinta;
use App\Http\Requests\StoreUpdateTinta;
use PDF;

class TintaController extends Controller
{

    public function cadastroTinta()
    {
        return view('tinta.cadastroTinta');
    }

    public function storeTinta (StoreUpdateTinta $request)
    {
        $tinta = new Tinta;

        $tinta->modelo = $request->modelo;
        $tinta->qtde_impressora = $request->qtde_impressora;
        $tinta->estoque = $request->estoque;

        $user = auth()->user();

        $tinta->save();
        return redirect('/Suprimentos')->with('msg', 'Tinta cadastrada com sucesso');
    }

    public function deleteTinta($id)
    {
        Tinta::findOrFail($id)->delete();
        return redirect('/Suprimentos')->with('msg', 'Tinta excluída com sucesso');
    }

    public function editTinta($id){

        $user = auth()->user();

        $tinta = Tinta::findOrFail($id);

        return view('tinta.editTinta', ['tinta' => $tinta]);
    }

    public function updateTinta(StoreUpdateTinta $request)
    {
        $data = $request->all();

        Tinta::findOrFail($request->id)->update($data);

        return redirect('/Suprimentos')->with('msg', 'Tinta editada com sucesso!');
    }

    public function exportTintaPDF() {

        $user = auth()->user();

        $tintas = Tinta::all();

        view()->share('tintas', $tintas,);
        $pdf_doc = PDF::loadView('layouts.export_tinta_pdf', $tintas);

        return $pdf_doc->download('pdf.pdf');
    }

    public function showTinta()
    {
        $tintas = Tinta::all();

        return view('tinta.showTinta', ['tintas' => $tintas]);
    }
}
