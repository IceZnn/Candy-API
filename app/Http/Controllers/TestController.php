<?php

namespace App\Http\Controllers;

use App\Jobs\LimparCacheDoces;
use Illuminate\Http\Request;
use App\Models\DoceModel;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    private const TTL_LISTA   = 30;
    private const TTL_DETALHE = 60;

    private function keyTodos(): string
    {
        return 'doces.todos';
    }

    private function keyDoce(int $id): string
    {
        return "doces.{$id}";
    }

    private function keyDoceUsuario(int $id, int $userId): string
    {
        return "doces.{$id}.user.{$userId}";
    }

    public function salva_doce(Request $request)
    {
        $request->validate([
            'Nome'         => 'required',
            'Sabor'        => 'required',
            'Ingredientes' => 'required',
            'Preco'        => 'required|numeric|min:0',
            'Alergicos'    => 'required',
            'Quantidade'   => 'required|integer|min:0',
            'Descricao'    => 'required',
        ]);

        try {
            $usuario = $request->attributes->get('usuario');

            DoceModel::create([
                'Nome'         => $request->Nome,
                'Sabor'        => $request->Sabor,
                'Ingredientes' => $request->Ingredientes,
                'Preco'        => $request->Preco,
                'Alergicos'    => $request->Alergicos,
                'Quantidade'   => $request->Quantidade,
                'Descricao'    => $request->Descricao,
                'user_id'      => $usuario->id,
            ]);

            LimparCacheDoces::dispatch(null, $usuario->id);

            return redirect('/doces')->with('sucesso', 'Doce cadastrado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('erro', 'Erro ao cadastrar doce: ' . $th->getMessage());
        }
    }

    public function exibe_doce(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = Cache::remember($this->keyDoceUsuario($id, $usuario->id), now()->addMinutes(self::TTL_DETALHE), function () use ($id, $usuario) {
            return DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();
        });

        if (!$doce) {
            return response()->json(['erro' => 's', 'mensagem' => 'Doce não encontrado'], 404);
        }

        return response()->json(['erro' => 'n', 'doces' => $doce], 200);
    }

    public function editar_doce(Request $request, $id)
    {
        $usuario = $request->attributes->get('usuario');

        $doce = Cache::remember($this->keyDoceUsuario($id, $usuario->id), now()->addMinutes(self::TTL_DETALHE), function () use ($id, $usuario) {
            return DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();
        });

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
            'Preco'        => 'required|numeric|min:0',
            'Alergicos'    => 'required',
            'Quantidade'   => 'required|integer|min:0',
            'Descricao'    => 'required',
        ]);

        try {
            $usuario = $request->attributes->get('usuario');

            $doce = DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->firstOrFail();

            $doce->update([
                'Nome'         => $request->Nome,
                'Sabor'        => $request->Sabor,
                'Ingredientes' => $request->Ingredientes,
                'Preco'        => $request->Preco,
                'Alergicos'    => $request->Alergicos,
                'Quantidade'   => $request->Quantidade,
                'Descricao'    => $request->Descricao,
            ]);

            LimparCacheDoces::dispatch($id, $usuario->id);

            return redirect('/doces')->with('sucesso', 'Doce atualizado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('erro', 'Erro ao atualizar doce: ' . $th->getMessage());
        }
    }

    public function todos_doces()
    {
        $doces = Cache::remember($this->keyTodos(), now()->addMinutes(self::TTL_LISTA), function () {
            \Log::info('🔥 CACHE MISS - Buscando do banco');
            return DoceModel::all();
        });

        \Log::info('📦 CACHE HIT - Retornando do cache');
        return response()->json(['erro' => 'n', 'doces' => $doces], 200);
    }

    public function exibe_doce_view(Request $request, $id)
    {
        $doce = Cache::remember($this->keyDoce($id), now()->addMinutes(self::TTL_DETALHE), function () use ($id) {
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

        $doce = Cache::remember($this->keyDoceUsuario($id, $usuario->id), now()->addMinutes(self::TTL_DETALHE), function () use ($id, $usuario) {
            return DoceModel::where('id', $id)
                ->where('user_id', $usuario->id)
                ->first();
        });

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

            LimparCacheDoces::dispatch($id, $usuario->id);

            return redirect('/doces')->with('sucesso', 'Doce deletado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('erro', 'Erro ao deletar doce');
        }
    }
}