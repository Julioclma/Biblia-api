<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Testamento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    public function index(): JsonResponse
    {
        $check = Testamento::all();

        if (count($check) > 0) {
            return response()->json($check, 200);
        }

        return response()->json(['message' => 'Nenhum testamento encontrado'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $check = Testamento::create($request->all());

        if ($check) {
            return response()->json(['message' => 'Cadastrado com sucesso', 'content' => $request->all()], 201);
        }
        return response()->json(['message' => 'Erro ao cadastrar', 'content' => $request->all()], 404);
    }

    public function show(string $id): JsonResponse
    {
        $testamento = Testamento::find($id);

        if ($testamento) {
            return response()->json([
                'testamento' => $testamento,
                'livros' => $testamento->livros($id)
            ], 200);
        }

        return response()->json(['message' => 'Testamento não encontrado', 'id' => $id], 404);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $testamentoExist = Testamento::find($id);

        if ($testamentoExist) {

            $update = Testamento::find($id)->update($request->all());

            if ($update) {
                return response()->json(['message' => 'Testamento atualizado com sucesso!', 'content' => $request->all()], 200);
            }
            return response()->json(['message' => 'Não foi possivel atualizar o testamento!', 'content' => $request->all()], 404);
        }

        return response()->json(['message' => 'Testamento não encontrado', 'content' => $request->all()], 404);
    }

    public function destroy(string $id): JsonResponse
    {
        $content = Testamento::find($id);

        if (!is_null($content)) {
            $destroy = Testamento::destroy($id);

            if ($destroy) {
                return  response()->json(['message' => 'Testamento deletado com sucesso', 'content' => $content], 200);
            }

            return response()->json(['message' => 'Erro ao deletar testamento', 'content' => $content], 404);
        }

        return response()->json(['message' => 'Nenhum registro encontrado', 'id' => $id], 404);
    }
}
