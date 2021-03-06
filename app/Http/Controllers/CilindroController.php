<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cilindro;
use App\Http\Requests\StoreUpdateCilindro;
use PDF;

class CilindroController extends Controller
{

    public function cadastroCilindro()
    {
        return view('cilindro.cadastroCilindro');
    }

    public function storeCilindro (StoreUpdateCilindro $request)
    {
        $cilindro = new Cilindro;

        $cilindro->modelo = $request->modelo;
        $cilindro->qtde_impressora = $request->qtde_impressora;
        $cilindro->estoque = $request->estoque;

        $user = auth()->user();

        $cilindro->save();
        return redirect('/Suprimentos')->with('msg', 'Cilindro cadastrado com sucesso');
    }

    public function deleteCilindro($id)
    {
        Cilindro::findOrFail($id)->delete();
        return redirect('/Suprimentos')->with('msg', 'Cilindro excluído com sucesso');
    }

    public function editCilindro ($id){


        $cilindro  = Cilindro::findOrFail($id);

        return view('cilindro.editCilindro',['cilindro' => $cilindro ]);
    }

    public function updateCilindro(StoreUpdateCilindro $request)
    {
        $data = $request->all();

        Cilindro::findOrFail($request->id)->update($data);

        return redirect()->back()->with('msg', 'Cilindro editado com sucesso!');
    }

    public function exportCilindroPDF() {

        $cilindros = Cilindro::select('cilindro.*')
                        ->orderBy('modelo')
                        ->paginate(20);

    foreach($cilindros as $cilindro)

            if($cilindro->estoque > $cilindro->qtde_impressora){
                $cilindro->cor = 'rgba(39, 174, 96, 0.5)';
            }

            elseif($cilindro->estoque == $cilindro->qtde_impressora){
                $cilindro->cor = 'rgba(241, 196, 15, 0.5)';
            }

            elseif($cilindro->estoque < $cilindro->qtde_impressora){
                $cilindro->cor = 'rgba(231, 76, 60, 0.5)';
            }

        view()->share('cilindros', $cilindros);
        $pdf_doc = PDF::loadView('layouts.export_cilindro_pdf', $cilindros);

        return $pdf_doc->download('Cilindro.pdf');
    }

    public function showCilindro()
    {
        $cilindros = Cilindro::select('cilindro.*')
                        ->orderBy('modelo')
                        ->paginate(20);

        foreach($cilindros as $cilindro)

        if($cilindro->estoque > $cilindro->qtde_impressora){
            $cilindro->cor = 'rgba(39, 174, 96, 0.5)';
        }

        elseif($cilindro->estoque == $cilindro->qtde_impressora){
            $cilindro->cor = 'rgba(241, 196, 15, 0.5)';
        }

        elseif($cilindro->estoque < $cilindro->qtde_impressora){
            $cilindro->cor = 'rgba(231, 76, 60, 0.5)';
        }

        return view('cilindro.showCilindro', ['cilindros' => $cilindros]);
    }
}
