<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impressora;
use App\Models\ImpressorasXavantes;
use App\Models\ImpressorasMendesJr;
use App\Http\Requests\StoreUpdateImpressora;
use PDF;

class ImpressoraController extends Controller
{
    public function indexImpressora()
    {
        $impressoras = Impressora::select('impressora.*')
                                ->orderBy('setor')
                                ->paginate(50);

        $impressorasXavantess = ImpressorasXavantes::select('impressorasXavantes.*')
                                ->orderBy('setor')
                                ->paginate(50);

        $impressorasMendesJrs = ImpressorasMendesJr::select('impressorasMendesJr.*')
                                ->orderBy('setor')
                                ->paginate(50);

        return view('impressora.indexImpressora', ['impressoras' => $impressoras, 'impressorasXavantess' => $impressorasXavantess, 'impressorasMendesJrs' => $impressorasMendesJrs]);
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $impressoras = Impressora::where('modelo', 'LIKE', "%{$request->search}%")
                            ->orWhere('tonner', 'LIKE', "%{$request->search}%")
                            ->orWhere('setor', 'LIKE', "%{$request->search}%")
                            ->orderBy('setor')
                            ->paginate(50);

        $impressorasXavantess = ImpressorasXavantes::where('modelo', 'LIKE', "%{$request->search}%")
                            ->orWhere('tonner', 'LIKE', "%{$request->search}%")
                            ->orWhere('setor', 'LIKE', "%{$request->search}%")
                            ->orderBy('setor')
                            ->paginate(50);

        $impressorasMendesJrs = ImpressorasMendesJr::where('modelo', 'LIKE', "%{$request->search}%")
                            ->orWhere('tonner', 'LIKE', "%{$request->search}%")
                            ->orWhere('setor', 'LIKE', "%{$request->search}%")
                            ->orderBy('setor')
                            ->paginate(50);

        return view('impressora.indexImpressora', ['impressoras' => $impressoras, 'filters' => $filters, 'impressorasXavantess' => $impressorasXavantess, 'impressorasMendesJrs' => $impressorasMendesJrs]);
    }

    public function cadastroImpressora()
    {
        return view('impressora.cadastroImpressora');
    }

    public function storeImpressora (StoreUpdateImpressora $request)
    {
        $impressora = new Impressora;

        $impressora->modelo = $request->modelo;
        $impressora->tonner = $request->tonner;
        $impressora->setor = $request->setor;

        $user = auth()->user();

        $impressora->save();
        return redirect('/Impressoras')->with('msg', 'Impressora cadastrada com sucesso');
    }

    public function deleteImpressora($id)
    {
        Impressora::findOrFail($id)->delete();
        return redirect('/Impressoras')->with('msg', 'Impressora excluída com sucesso');
    }

    public function editImpressora ($id){


        $impressora  = Impressora::findOrFail($id);

        return view('impressora.editImpressora',['impressora' => $impressora ]);
    }

    public function updateImpressora(StoreUpdateImpressora $request)
    {
        $data = $request->all();

        Impressora::findOrFail($request->id)->update($data);

        return redirect('/Impressoras')->with('msg', 'Impressora editada com sucesso!');
    }

    public function exportImpressoraPDF() {


        $impressoras = Impressora::all();

        view()->share('impressoras', $impressoras,);
        $pdf_doc = PDF::loadView('layouts.export_impressora_pdf', $impressoras);

        return $pdf_doc->download('pdf.pdf');
    }

    public function showImpressora()
    {
        $impressoras = Impressora::all();

        return view('impressora.showImpressora', ['impressoras' => $impressoras]);

    }
}
