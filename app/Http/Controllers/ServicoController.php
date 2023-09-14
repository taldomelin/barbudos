<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller

{
    public function criarServico(ServicoFormRequest $request)
    {
        $servico = servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Serviço cadastrado",
            "data" => $servico
           
        ], 200);
         
        if (count($servico) > 0) {
            return response()->json([
                'status' => false,
                "message" => "O Serviço contem mais de 200 caracteres, e não pode ser cadastrado",
                'data' => $servico
            ]);
        }
    }
    public function pesquisaPorNome(Request $request)
    {
        $servico = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($servico) > 0) {

            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }
    public function excluir($id)
    {
        $servico = Servico::find($id);
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        $servico->delete();
        return response()->json([
            'status' => true,
            'message' => "Usuário excluído com sucesso"
        ]);
    }

    public function update(Request $request)
    {
        $servico = Servico::find($request->id);

        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }
       
        if(isset($request->nome)){
        $servico-> nome = $request->nome;
        }
        if(isset($request->descricao)){
        $servico-> nodescricaome = $request->descricao;
        }
        if(isset($request->duracao)){
        $servico-> duracao = $request->duracao;
        }
        if(isset($request->preco)){
        $servico-> preco = $request->preco;
        }

        $servico->update();

        return response()->json([
            'status' => true,
            'message' => "Serviço atualizado."
        ]);
       
    }
}