<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BotsController;
use App\Http\Requests\StoreUpdateBots;
use App\Models\BotsModel;

use Illuminate\Http\Request;

class BotsController extends Controller
{
    public function bots(){
        $bots = BotsModel::all();

        return view ('bots.index', compact('bots'));
    }

    public function botsSalvar(StoreUpdateBots $request){
        $bots = new BotsModel;

        $bots->nome_grupo = $request->nome_grupo;
        $bots->bot_id = $request->bot_id;
        $bots->chat_id = $request->chat_id;

        $bots->save();

        return redirect()->back()->with('msg', 'Bot cadastrado com sucesso');
    }

    public function botsEditar($id){

        $bots = BotsModel::findOrFail($id);

        return view('bots.editBot', compact('bots'));
    }

    public function botsUpdate(StoreUpdateBots $request){
        $data = $request->all();

        $bots = BotsModel::findOrFail($request->id);

        $bots->update($data);

        return redirect()->back()->with('msg', 'Bot editado com sucesso');
    }

    public function botsDelete($id)
    {
        $bots = BotsModel::findOrFail($id);

        $bots->delete();

        return redirect()->back()->with('msg','Bot excluído com sucesso');
    }
}