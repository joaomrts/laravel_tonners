<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Http\Requests\StoreUpdateEquipamento;
use PDF;

class EquipamentoController extends Controller
{
    public function indexEquipamento()
    {
        $equipamentos = Equipamento::paginate(20);

        return view('equipamento.indexEquipamento', ['equipamentos' => $equipamentos]);
    }

    public function searchEquipamento(Request $request)
    {
        $filters = $request->except('_token');

        $equipamentos = Equipamento::where('numeroIp', 'LIKE', "%{$request->search}%")
                            ->orWhere('setor', 'LIKE', "%{$request->search}%")
                            ->orWhere('equipamento', 'LIKE', "%{$request->search}%")
                            ->paginate(30);

        return view('equipamento.indexEquipamento', ['equipamentos' => $equipamentos, 'filters' => $filters]);
    }

    public function cadastroEquipamento()
    {
        return view('equipamento.cadastroEquipamento');
    }

    public function storeEquipamento (StoreUpdateEquipamento $request)
    {
        $equipamento = new Equipamento;

        $equipamento->numeroIp = $request->numeroIp;
        $equipamento->setor = $request->setor;
        $equipamento->equipamento = $request->equipamento;

        $user = auth()->user();

        $equipamento->save();
        return redirect('/')->with('msg', 'Equipamento cadastrado com sucesso');
    }

    public function deleteEquipamento($id)
    {
        Equipamento::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Equipamento excluído com sucesso');
    }

    public function editEquipamento ($id){

        $equipamento  = Equipamento::findOrFail($id);

        return view('equipamento.editEquipamento',['equipamento' => $equipamento ]);
    }

    public function updateEquipamento(StoreUpdateEquipamento $request)
    {
        $data = $request->all();

        Equipamento::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Equipamento editado com sucesso!');
    }

    public function exportEquipamentoPDF() {

        $equipamentos = Equipamento::all();

        view()->share('equipamentos', $equipamentos,);
        $pdf_doc = PDF::loadView('layouts.export_equipamento_pdf', $equipamentos);

        return $pdf_doc->download('pdf.pdf');
    }

    public function showEquipamento()
    {
        $equipamentos = Equipamento::all();

        return view('equipamento.showEquipamento', ['equipamentos' => $equipamentos]);
    }
}
