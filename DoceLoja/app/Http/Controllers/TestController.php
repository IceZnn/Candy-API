<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoceModel;
use Symfony\Contracts\Service\Attribute\Required;

class TestController extends Controller
{
        public function envia_teste(Request $request){

            $data = [
                'Palmeiras'=>"5x1",
                'Numero'=>$request->numero
            ];

            return response()->json($data, 200, );
        }

        public function soma(Request $request){

            $data = [
                'Soma'=> $request->numero + $request->numero_dois,
            ];

            return response()->json($data, 200, );
        }

        public function salva_doce(Request $request){

            $request->validate([
                'Nome'=> 'required',
                'Sabor'=>'required',
                'Ingredientes'=>'required',
                'Preço'=>'required',
                'Alérgicos'=>'required',
                'Quantidade'=>'required',
                'Descrição'=>'required',

            ]);

            try {
                $doces = new DoceModel();
                $doces->Nome = $request ->Nome;
                $doces->Sabor = $request ->Sabor;
                $doces->Ingredientes = $request ->Ingredientes;
                $doces->Preço = $request ->Preço;
                $doces->Alérgicos = $request ->Alérgicos;
                $doces->Quantidade = $request ->Quantidade;
                $doces->Descrição = $request ->Descrição;
                $doces->save();

                $data = [
                    'erro'=> 'n',
                    'doce'=> $doces,
                ];
                return response()->json($data,200);


            }   catch(\Throwable $th){
                throw $th;
            }

        }

        public function exibe_doce($id)
        {

            $doces=DoceModel::find($id);

            $data = [
                    'erro'=> 'n',
                    'doces'=> $doces,
                ];
                return response()->json($data,200);

        }

        public function todos_doces()
        {

            $doces=DoceModel::get()->all();

                $data = [
                        'erro'=> 'n',
                        'doces'=> $doces,
                ];
                return response()->json($data,200);

        }
}
