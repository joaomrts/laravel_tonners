<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpressorasXavantes;
use App\Http\Requests\StoreUpdateXavantes;
use PDF;

class ImpressorasXavantesController extends Controller
{

    public function cadastroImpressorasXavantes()
    {
        return view('impressorasXavantes.cadastroImpressorasXavantes');
    }

    public function storeImpressorasXavantes (StoreUpdateXavantes $request)
    {
        $impressorasXavantes = new ImpressorasXavantes;

        $impressorasXavantes->modelo = $request->modelo;
        $impressorasXavantes->tonner = $request->tonner;
        $impressorasXavantes->setor = $request->setor;

        $user = auth()->user();

        $impressorasXavantes->save();
        return redirect('/indexImpressora')->with('msg', 'Impressora cadastrada com sucesso');
    }

    public function deleteImpressorasXavantes($id)
    {
        ImpressorasXavantes::findOrFail($id)->delete();
        return redirect('/indexImpressora')->with('msg', 'Impressora excluída com sucesso');
    }

    public function editImpressorasXavantes ($id){


        $impressorasXavantes  = ImpressorasXavantes::findOrFail($id);

        return view('impressorasXavantes.editImpressorasXavantes',['impressorasXavantes' => $impressorasXavantes ]);
    }

    public function updateImpressorasXavantes(StoreUpdateXavantes $request)
    {
        $data = $request->all();

        ImpressorasXavantes::findOrFail($request->id)->update($data);

        return redirect('/indexImpressora')->with('msg', 'Impressora editada com sucesso!');
    }

    public function exportImpressorasXavantesPDF() {


        $impressorasXavantess = ImpressorasXavantes::all();

        view()->share('impressorasXavantess', $impressorasXavantess,);
        $pdf_doc = PDF::loadView('layouts.export_impressorasXavantes_pdf', $impressorasXavantess);

        return $pdf_doc->download('pdf.pdf');
    }

    public function showImpressorasXavantes()
    {
        $impressorasXavantess = ImpressorasXavantes::all();

        return view('impressorasXavantes.showImpressorasXavantes', ['impressorasXavantess' => $impressorasXavantess]);

    }
}
