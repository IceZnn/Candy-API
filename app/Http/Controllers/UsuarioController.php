<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TokenUser;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function cadastra_usuario(Request $request){
        $request->validate([
            "nome"     => 'required',
            "email"    => 'required|email|unique:usuario,email',
            "telefone" => 'required',
            "empresa"  => 'required',
            "senha"    => 'required|min:6',
        ]);

        try{
            $usuario           = new Usuario();
            $usuario->nome     = $request->nome;
            $usuario->email    = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->empresa  = $request->empresa;
            $usuario->senha    = md5($request->senha);
            $usuario->save();

            return response()->json([
                'erro' => 'n',
                'data' => 'Usuário cadastrado com sucesso.'
            ], 201);

        }catch(\Throwable $th){
            return response()->json([
                'erro' => 's',
                'data' => 'Erro ao cadastrar usuário: ' . $th->getMessage()
            ], 500);
        }
    }

    public function login(Request $request){
        $usuario = Usuario::where('email', $request->email)->first();

        if(!$usuario || $usuario->senha !== md5($request->senha)){
            return response()->json([
                'erro' => 's',
                'data' => 'E-mail ou senha incorretos.'
            ], 401);
        }

        TokenUser::where('user_id', $usuario->id)->delete();

        $token = new TokenUser();
        $token->user_id   = $usuario->id;
        $data             = date('Y-m-d H:i:s');
        $tokenValue       = md5($usuario->id . $usuario->email . $data);
        $token->token     = $tokenValue;
        $token->valido_ate = Carbon::now()->addDays(7);
        $token->save();

        $response = response()->json([
            'erro'  => 'n',
            'data'  => 'Login realizado com sucesso.',
            'token' => $tokenValue
        ], 200);

        return $response->cookie(
            'token',
            $tokenValue,
            10080,
            '/',
            null,
            false,
            false
        );
    }
}