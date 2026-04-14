<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoceModel;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    public function salva_doce(Request $request)
    {
        $request->validate([
            'Nome'         => 'required',
            'Sabor'        => 'required',
            'Ingredientes' => 'required',
            'Preco'        => 'required',
            'Alergicos'    => 'required',
            'Quantidade'   => 'required',
            'Descricao'    => 'required',
        ]);

        try {
            $usuario = $request->attributes->get('usuario');

            $doce = new DoceModel();
            $doce->Nome         = $request->Nome;
            $doce->Sabor        = $request->Sabor;
            $doce->Ingredientes = $request->Ingredientes;
            $doce->Preco        = $request->Preco;
            $doce->Alergicos    = $request->Alergicos;
            $doce->Quantidade   = $request->Quantidade;
            $doce->Descricao    = $request->Descricao;
            $doce->user_id      = $usuario->id;
            $doce->save();

            Cache::forget('todos_doces');

            return redirect('/doces')->with('sucesso', 'Doce cadastrado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('erro', 'Erro ao cadastrar doce: ' . $th->getMessage());
        }
    }

    public function exibe_doce(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = Cache::remember("doce.{$id}.user.{$usuario->id}", now()->addMinutes(30), function () use ($id, $usuario) {
            return DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();
        });

        if (!$doce) {
            return response()->json([
                'erro' => 's',
                'mensagem' => 'Doce não encontrado'
            ], 404);
        }

        return response()->json([
            'erro'  => 'n',
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
            return redirect('/doces')->with('erro', 'Doce não encontrado ou sem permissão');
        }

        return view('alteraDoce', compact('doce'));
    }

    public function atualiza_doce(Request $request, $id)
    {
        $request->validate([
            'Nome'         => 'required',
            'Sabor'        => 'required',
            'Ingredientes' => 'required',
            'Preco'        => 'required',
            'Alergicos'    => 'required',
            'Quantidade'   => 'required',
            'Descricao'    => 'required',
        ]);

        try {
            $usuario = $request->attributes->get('usuario');

            $doce = DoceModel::where('id', $id)
                    ->where('user_id', $usuario->id)
                    ->firstOrFail();

            $doce->Nome         = $request->Nome;
            $doce->Sabor        = $request->Sabor;
            $doce->Ingredientes = $request->Ingredientes;
            $doce->Preco        = $request->Preco;
            $doce->Alergicos    = $request->Alergicos;
            $doce->Quantidade   = $request->Quantidade;
            $doce->Descricao    = $request->Descricao;
            $doce->save();

            Cache::forget("doce.{$id}.user.{$usuario->id}");
            Cache::forget('todos_doces');

            return redirect('/doces')->with('sucesso', 'Doce atualizado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('erro', 'Erro ao atualizar doce: ' . $th->getMessage());
        }
    }

    public function todos_doces()
    {
        $doces = Cache::remember('todos_doces', now()->addMinutes(30), function () {
            return DoceModel::all();
        });

        return response()->json([
            'erro'  => 'n',
            'doces' => $doces,
        ], 200);
    }

    public function exibe_doce_view(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = Cache::remember("doce.view.{$id}", now()->addMinutes(30), function () use ($id) {
            return DoceModel::where('id', $id)->first();
        });

        if (!$doce) {
            return redirect('/doces')->with('erro', 'Doce não encontrado');
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
            return redirect('/doces')->with('erro', 'Sem permissão');
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

            Cache::forget("doce.{$id}.user.{$usuario->id}");
            Cache::forget("doce.view.{$id}");
            Cache::forget('todos_doces');

            return redirect('/doces')->with('sucesso', 'Doce deletado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('erro', 'Erro ao deletar doce');
        }
    }
}