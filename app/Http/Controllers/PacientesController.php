<?php

namespace App\Http\Controllers;

use App\Http\Requests\pacientesFormRequest;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function criarPaciente(pacientesFormRequest $request)
    {
        $pacientes = Pacientes::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
            'senha' => $request->senha
            

        ]);
        return response()->json([
            "success" => true,
            "message" => "Paciente cadastrado com sucesso",
            "data" => $pacientes
        ], 200);
    }

    public function pesquisarPorId($id)
    {
        $pacientes = Pacientes::find($id);
        if ($pacientes == null) {
            return response()->json([
                'status' => false,
                'message' => "Paciente não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $pacientes
        ]);
    }

    public function retornarTodos()
    {
        $pacientes = Pacientes::all();
        return response()->json([
            'status' => true,
            'data' => $pacientes
        ]);
    }

    public function pesquisarPorNome(Request $request)
    {
        $pacientes = Pacientes ::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($pacientes) > 0) {

            return response()->json([
                'status' => true,
                'data' => $pacientes
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para a pesquisa.'
        ]);
    }

    public function pesquisarPorCpf(Request $request)
    {
        $pacientes = Pacientes::where('especie', 'like', '%' . $request->especie . '%')->get();

        if (count($pacientes) > 0) {

            return response()->json([
                'status' => true,
                'data' => $pacientes
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para a pesquisa.'
        ]);
    }

    public function excluirPaciente(Request $request)
    {

        $pacientes = Pacientes::find($request->id);

        if (!isset($pacientes)) {
            return response()->json([
                'status' => false,
                'message' => "Paciente não encontrado"
            ]);
        } else {
            $pacientes->delete();
            return response()->json([
                'status' => true,
                'message' => "Paciente excluido com sucesso"
            ]);
        }
    }

    public function atualizarPaciente( $request)
    {


        $pacientes = Pacientes::find($request->id);

        if (!isset($pacientes)) {
            return response()->json([
                'status' => false,
                'message' => 'Paciente não encontrado',
            ]);
        }

        if (isset($request->nome)) {
            $pacientes->nome = $request->nome;
        }
        if (isset($request->data_nascimento)) {
            $pacientes->data_nascimento = $request->data_nascimento;
        }

        if (isset($request->endereco)) {
            $pacientes->endereco = $request->endereco;
        }

        if (isset($request->email)) {
            $pacientes->email = $request->email;
        }
        if (isset($request->cpf)) {
            $pacientes->cpf = $request->cpf;
        }
        if (isset($request->celular)) {
            $pacientes->celular = $request->celular;
        }
        if (isset($request->senha)) {
            $pacientes->senha = $request->senha;
        }
        $pacientes->update();

        return response()->json([
            'status' => true,
            'message' => 'Paciente atualizado'
        ]);
    }

}
