<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpressorasMendesJr;
use App\Http\Requests\StoreUpdateMendesJr;
use PDF;

class ImpressorasMendesJrController extends Controller
{


    public function cadastroImpressorasMendesJr()
    {
        return view('impressorasMendesJr.cadastroImpressorasMendesJr');
    }

    public function storeImpressorasMendesJr (StoreUpdateMendesJr $request)
    {
        $impressorasMendesJr = new ImpressorasMendesJr;

        $impressorasMendesJr->modelo = $request->modelo;
        $impressorasMendesJr->tonner = $request->tonner;
        $impressorasMendesJr->setor = $request->setor;

        $user = auth()->user();

        $impressorasMendesJr->save();
        return redirect('/indexImpressora')->with('msg', 'Impressora cadastrada com sucesso');
    }

    public function deleteImpressorasMendesJr($id)
    {
        ImpressorasMendesJr::findOrFail($id)->delete();
        return redirect('/indexImpressora')->with('msg', 'Impressora excluída com sucesso');
    }

    public function editImpressorasMendesJr ($id){

        $impressorasMendesJr  = ImpressorasMendesJr::findOrFail($id);

        return view('impressorasMendesJr.editImpressorasMendesJr',['impressorasMendesJr' => $impressorasMendesJr ]);
    }

    public function updateImpressorasMendesJr(StoreUpdateMendesJr $request)
    {
        $data = $request->all();

        ImpressorasMendesJr::findOrFail($request->id)->update($data);

        return redirect('/indexImpressora')->with('msg', 'Impressora editada com sucesso!');
    }

    public function exportImpressorasMendesJrPDF() {

        $impressorasMendesJrs = ImpressorasMendesJr::all();

        view()->share('impressorasMendesJrs', $impressorasMendesJrs,);
        $pdf_doc = PDF::loadView('layouts.export_impressorasMendesJr_pdf', $impressorasMendesJrs);

        return $pdf_doc->download('pdf.pdf');
    }

    public function showImpressorasMendesJr()
    {
        $impressorasMendesJrs = ImpressorasMendesJr::all();

        return view('impressorasMendesJr.showImpressorasMendesJr', ['impressorasMendesJrs' => $impressorasMendesJrs]);
    }
}
