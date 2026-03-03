<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TokenUser;

class UsuarioController extends Controller

{
    public function cadastra_usuario(Request $request){
        $request->validate([
            "nome"=> 'required',
            "email"=> 'required',
             "telefone"=> 'required',
            "empresa"=> 'required',
            "senha"=> 'required',
        ]);

        try{
            $usuario = new Usuario();
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->empresa = $request->empresa;
            $usuario->senha = md5($request->senha) ;
            $usuario->save();
        
            $data =[
                'erro'=>'n',
                'data'=> 'Erro ao Cadastrar Usuario'
            ] ;   
            return response()->json($data,200);

        }catch(\Throwable $th) {
            throw $th;   
        }

    



    }



}
