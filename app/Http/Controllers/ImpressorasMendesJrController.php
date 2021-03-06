<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpressorasMendesJr;
use App\Http\Requests\StoreUpdateMendesJr;
use PDF;

class ImpressorasMendesJrController extends Controller
{

    public function indexMendesJr()
    {
        $impressorasMendesJrs = ImpressorasMendesJr::all();
        return view('impressorasMendesJr.indexImpressorasMendesJr', compact('impressorasMendesJr'));
    }

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
        return redirect('/Impressoras')->with('msg', 'Impressora cadastrada com sucesso');
    }

    public function deleteImpressorasMendesJr($id)
    {
        ImpressorasMendesJr::findOrFail($id)->delete();
        return redirect('/Impressoras')->with('msg', 'Impressora excluída com sucesso');
    }

    public function editImpressorasMendesJr ($id){

        $impressorasMendesJr  = ImpressorasMendesJr::findOrFail($id);

        return view('impressorasMendesJr.editImpressorasMendesJr', compact('impressorasMendesJr'));
    }

    public function updateImpressorasMendesJr(StoreUpdateMendesJr $request)
    {
        $data = $request->all();

        ImpressorasMendesJr::findOrFail($request->id)->update($data);

        return redirect('/Impressoras')->with('msg', 'Impressora editada com sucesso!');
    }

    public function exportImpressorasMendesJrPDF() {

        $impressorasMendesJrs = ImpressorasMendesJr::select('impressorasmendesjr.*')
                                ->orderBy('setor')
                                ->paginate(20);

        view()->share('impressorasMendesJrs', $impressorasMendesJrs,);
        $pdf_doc = PDF::loadView('layouts.export_impressorasMendesJr_pdf', $impressorasMendesJrs);

        return $pdf_doc->download('ImpressorasMendesJr.pdf');
    }

    public function showImpressorasMendesJr()
    {
        $impressorasMendesJrs = ImpressorasMendesJr::select('impressorasmendesjr.*')
                                ->orderBy('setor')
                                ->paginate(20);

        return view('impressorasMendesJr.showImpressorasMendesJr', compact('impressorasMendesJrs'));
    }
}
