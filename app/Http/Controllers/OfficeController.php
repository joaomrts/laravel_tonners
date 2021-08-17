<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Requests\StoreUpdateOffice;
use PDF;


class OfficeController extends Controller
{
    public function indexOffice()
    {
        $offices = Office::select('office.*')
                        ->orderBy('setor')
                        ->paginate(25);

        return view('office.indexOffice', ['offices' => $offices]);
    }

    public function searchOffice(Request $request)
    {
        $filters = $request->except('_token');

        $offices = Office::where('usuario', 'LIKE', "%{$request->search}%")
                            ->orWhere('setor', 'LIKE', "%{$request->search}%")
                            ->orWhere('versao', 'LIKE', "%{$request->search}%")
                            ->orWhere('conta', 'LIKE', "%{$request->search}%")
                            ->orderBy('setor')
                            ->paginate(25);

        return view('office.indexOffice', ['offices' => $offices, 'filters' => $filters]);
    }

    public function cadastroOffice()
    {
        return view('office.cadastroOffice');
    }

    public function storeOffice (StoreUpdateOffice $request)
    {
        $office = new Office;

        $office->usuario = $request->usuario;
        $office->setor = $request->setor;
        $office->versao = $request->versao;
        $office->conta = $request->conta;

        $user = auth()->user();

        $office->save();
        return redirect('/Office')->with('msg', 'Office cadastrado com sucesso');
    }

    public function deleteOffice($id)
    {
        Office::findOrFail($id)->delete();
        return redirect('/Office')->with('msg', 'Office excluído com sucesso');
    }

    public function editOffice ($id){

        $office  = Office::findOrFail($id);

        return view('office.editOffice',['office' => $office ]);
    }

    public function updateOffice(StoreUpdateOffice $request)
    {
        $data = $request->all();

        Office::findOrFail($request->id)->update($data);

        return redirect('/Office')->with('msg', 'Office editado com sucesso!');
    }

    public function exportOfficePDF() {

        $offices = Office::select('office.*')
                    ->orderBy('setor')
                    ->paginate(200);

        view()->share('offices', $offices,);
        $pdf_doc = PDF::loadView('layouts.export_office_pdf', $offices);

        return $pdf_doc->download('Office.pdf');
    }

    public function showOffice()
    {
        $offices = Office::select('office.*')
                    ->orderBy('setor')
                    ->paginate(200);

        return view('office.showOffice', ['offices' => $offices]);
    }
}
