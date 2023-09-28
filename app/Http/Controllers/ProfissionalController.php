<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function criarProfissional(ProfissionalFormRequest $request)
    {
        $profissional = Profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'nascimento' => $request->nascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'salario' => $request->salario,
            'password' => $request->password
        ]);
        return response()->json([
            "success" => true,
            "message" => "Profissional cadastrado",
            "data" => $profissional
        ], 200);
        
    }
    public function pesquisaPorNome(Request $request)
    {
        $profissional = profissional::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($profissional) > 0) {

            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }
    public function pesquisaCelular(Request $request)
    {
        $profissional = profissional::where('celular', 'like', '%' . $request->celular . '%')->get();

        if (count($profissional) > 0) {

            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }
    public function pesquisaCPF(Request $request)
    {
        $profissional = profissional::where('cpf', 'like', '%' . $request->cpf . '%')->get();

        if (count($profissional) > 0) {

            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }
    public function pesquisaEmail(Request $request)
    {
        $profissional = profissional::where('email', 'like', '%' . $request->email . '%')->get();

        if (count($profissional) > 0) {

            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }
    public function excluir($id)
    {
        $profissional = profissional::find($id);
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        $profissional->delete();
        return response()->json([
            'status' => true,
            'message' => "Profissional excluído com sucesso"
        ]);
    }
    public function update( ProfissionalFormRequest $request)
    {
        $profissional = profissional::find($request->id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
       
        if(isset($request->nome)){
        $profissional-> nome = $request->nome;
        }
        if(isset($request->celular)){
        $profissional-> celular = $request->celular;
        }
        if(isset($request->email)){
        $profissional-> email = $request->email;
        }
        if(isset($request->cpf)){
        $profissional-> cpf = $request->cpf;
        }
        if(isset($request->nascimento)){
            $profissional-> nascimento = $request->nascimento;
        }
        if(isset($request->cidade)){
            $profissional-> cidade = $request->cidade;
        }
        if(isset($request->estado)){
            $profissional-> estado = $request->estado;
        }
        if(isset($request->pais)){
            $profissional-> pais = $request->pais;
        }
        if(isset($request->rua)){
            $profissional-> rua = $request->rua;
        }
        if(isset($request->numero)){
            $profissional-> numero = $request->numero;
        }
        if(isset($request->bairro)){
            $profissional-> bairro = $request->bairro;
        }
        if(isset($request->cep)){
            $profissional-> cep = $request->cep;
        }
        if(isset($request->complemento)){
            $profissional-> complemento = $request->complemneto;
        }
        if(isset($request->salario)){
            $profissional-> salario = $request->salario;
        }
        if(isset($request->password)){
            $profissional-> password = $request->password;
        }


        $profissional->update();

        return response()->json([
            'status' => true,
            'message' => "Profissional atualizado."
        ]);
       
    }
}
