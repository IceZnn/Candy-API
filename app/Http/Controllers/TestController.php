<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoceModel;

class TestController extends Controller
{
    public function salva_doce(Request $request)
    {
        $request->validate([
            'Nome' => 'required',
            'Sabor' => 'required',
            'Ingredientes' => 'required',
            'Preco' => 'required',
            'Alergicos' => 'required',
            'Quantidade' => 'required',
            'Descricao' => 'required',
        ]);

        try {
            $doces = new DoceModel();
            $doces->Nome = $request->Nome;
            $doces->Sabor = $request->Sabor;
            $doces->Ingredientes = $request->Ingredientes;
            $doces->Preco = $request->Preco;
            $doces->Alergicos = $request->Alergicos;
            $doces->Quantidade = $request->Quantidade;
            $doces->Descricao = $request->Descricao;
            $doces->save();

            return response()->json([
                'erro' => 'n',
                'doce' => $doces,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 's',
                'mensagem' => $th->getMessage()
            ], 500);
        }
    }

    public function exibe_doce($id)
    {
        $doce = DoceModel::find($id);
        
        if (!$doce) {
            return response()->json([
                'erro' => 's',
                'mensagem' => 'Doce não encontrado'
            ], 404);
        }
        
        return response()->json([
            'erro' => 'n',
            'doces' => $doce,
        ], 200);
    }


    public function editar_doce($id)
{
    $doce = DoceModel::find($id);
    
    if (!$doce) {
        return redirect('/Cadastro')->with('erro', 'Doce não encontrado');
    }
    
    return view('alteraDoce', compact('doce'));
}

public function atualiza_doce(Request $request, $id)
{
    $request->validate([
        'Nome' => 'required',
        'Sabor' => 'required',
        'Ingredientes' => 'required',
        'Preco' => 'required',
        'Alergicos' => 'required',
        'Quantidade' => 'required',
        'Descricao' => 'required',
    ]);

    try {
        $doce = DoceModel::find($id);
        
        $doce->Nome = $request->Nome;
        $doce->Sabor = $request->Sabor;
        $doce->Ingredientes = $request->Ingredientes;
        $doce->Preco = $request->Preco;
        $doce->Alergicos = $request->Alergicos;
        $doce->Quantidade = $request->Quantidade;
        $doce->Descricao = $request->Descricao;
        $doce->save();

        return response()->json([
            'erro' => 'n',
            'doce' => $doce,
        ], 200);

    } catch (\Throwable $th) {
        return response()->json([
            'erro' => 's',
            'mensagem' => $th->getMessage()
        ], 500);
    }
}
    public function todos_doces()
    {
        return response()->json([
            'erro' => 'n',
            'doces' => DoceModel::all(),
        ], 200);
    }
    
    public function exibe_doce_view($id)
    {
        $doce = DoceModel::find($id);
        
        if (!$doce) {
            return redirect('/doces')->with('erro', 'Doce não encontrado');
        }
        
        return view('exibeDoce', compact('doce'));
    }
}