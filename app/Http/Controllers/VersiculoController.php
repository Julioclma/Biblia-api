<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Versiculo::all());
    }

    public function store(Request $request): JsonResponse
    {
        $create = Versiculo::create($request->all());

        if ($create) {
            return response()->json(['message' => 'Versículo criado com sucesso!', 'content' => $request->all()]);
        }

        return response()->json(['message' => 'Erro ao criar Versículo']);
    }

    public function show(string $id): JsonResponse
    {
        $versiculo = Versiculo::find($id);

        if ($versiculo) {
            return response()->json($versiculo);
        }

        return response()->json(['message' => 'Versiculo não encontrado!']);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $versiculo = Versiculo::find($id);

        if ($versiculo) {
            $update = Versiculo::find($id)->update($request->all());

            if ($update) {
                return response()->json(['message' => 'Versiculo atualizado com sucesso!']);
            }

            return response()->json(['message' => 'Não foi possivel atualizar versiculo!']);
        }

        return response()->json(['message' => 'Versículo não encontrado!']);
    }

    public function destroy(string $id): JsonResponse
    {
        $destroy = Versiculo::destroy($id);

        if ($destroy) {
            return response()->json(['message' => 'Versículo removido com sucesso!']);
        }

        return response()->json(['message' => 'Erro ao remover versiculo!']);
    }
}
