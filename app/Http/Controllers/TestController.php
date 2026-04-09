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

            $usuario = $request->attributes->get('usuario');

            $doces = new DoceModel();
            $doces->Nome = $request->Nome;
            $doces->Sabor = $request->Sabor;
            $doces->Ingredientes = $request->Ingredientes;
            $doces->Preco = $request->Preco;
            $doces->Alergicos = $request->Alergicos;
            $doces->Quantidade = $request->Quantidade;
            $doces->Descricao = $request->Descricao;
            $doces->user_id = $usuario->id;
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

    public function exibe_doce(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();

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

    public function editar_doce(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();

        if (!$doce) {
            return redirect('/Cadastro')->with('erro', 'Doce não encontrado ou sem permissão');
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

            $usuario = $request->attributes->get('usuario');

            $doce = DoceModel::where('id', $id)
                    ->where('user_id', $usuario->id)
                    ->firstOrFail();

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

    public function exibe_doce_view(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');
        
        $doce = DoceModel::where('id', $id)->first();

        if (!$doce) {
            return redirect('/Dashboard')->with('erro', 'Doce não encontrado');
        }

        return view('exibeDoce', compact('doce'));
    }

    public function mostrar_formulario_delete(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();

        if (!$doce) {
            return redirect('/Dashboard')->with('erro', 'Sem permissão');
        }

        return view('deletaDoce', compact('doce', 'id'));
    }

    public function deleta_doce(Request $request, $id)
    {
        try {

            $usuario = $request->attributes->get('usuario');

            $doce = DoceModel::where('id', $id)
                    ->where('user_id', $usuario->id)
                    ->firstOrFail();

            $doce->delete();

            return redirect('/Dashboard')->with('success', 'Doce deletado com sucesso!');

        } catch (\Exception $e) {

            return back()->with('error', 'Erro ao deletar doce');
        }
    }
    
}