<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Versiculo::all(), 200);
    }

    public function store(Request $request): JsonResponse
    {
        $create = Versiculo::create($request->all());

        if ($create) {
            return response()->json(['message' => 'Versículo criado com sucesso!', 'content' => $request->all()], 201);
        }

        return response()->json(['message' => 'Erro ao criar Versículo'], 404);
    }

    public function show(string $id): JsonResponse
    {
        $versiculo = Versiculo::find($id);

        if ($versiculo) {
            return response()->json($versiculo, 200);
        }

        return response()->json(['message' => 'Versiculo não encontrado!'], 404);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $versiculo = Versiculo::find($id);

        if ($versiculo) {
            $update = Versiculo::find($id)->update($request->all());

            if ($update) {
                return response()->json(['message' => 'Versiculo atualizado com sucesso!'], 200);
            }

            return response()->json(['message' => 'Não foi possivel atualizar versiculo!'], 404);
        }

        return response()->json(['message' => 'Versículo não encontrado!'], 404);
    }

    public function destroy(string $id): JsonResponse
    {
        $destroy = Versiculo::destroy($id);

        if ($destroy) {
            return response()->json(['message' => 'Versículo removido com sucesso!'], 200);
        }

        return response()->json(['message' => 'Erro ao remover versiculo!'], 404);
    }
}
