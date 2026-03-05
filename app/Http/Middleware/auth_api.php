<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TokenUser;
use App\Models\Usuario;
use Carbon\Carbon;

class auth_api
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('token')){
            $hoje = Carbon::now();

            $token = TokenUser::where('token', $request->token)
                ->where('valido_ate','>=',$hoje)
                ->first();

            if($token){
                $usuario = Usuario::find($token->user_id);

                $request->attributes->set('usuario', $usuario);
                $request->attributes->set('token', $token);
                return $next($request);
            }else{

                $data=[
                    'erro'=> 's',
                    'msg'=> 'Token inválido ou expirado',
                ];

                return response()->json($data,401);
            }

        }else{
            $data=[
                'erro'=> 's',
                'msg'=> 'Você nao enviou o token',
            ];

            return response()->json($data,401);
        }
    }
}