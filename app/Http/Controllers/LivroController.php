<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    public function index(): JsonResponse
    {
        $livroExist = Livro::all();

        if ($livroExist) {
            return response()->json($livroExist, 200);
        }

        return response()->json(['message' => 'Nenhum livro cadastrado!'], 404);
    }


    public function store(Request $request): JsonResponse
    {
        $created = Livro::create($request->all());

        if ($created) {
            return response()->json(['message' => 'Livro cadastrado com sucesso!', 'content' => $request->all()], 201);
        }
        return response()->json(['message' => 'Não foi possivel cadastrar o Livro'], 404);
    }


    public function show(string $id): JsonResponse
    {
        $livro = Livro::find($id);

        if ($livro) {
            return response()->json(['livro' => $livro,
        'testamento' => $livro->testamento], 200);
        }

        return response()->json(['message' => 'Livro não encontrado!'], 404);
    }


    public function update(Request $request, string $id): JsonResponse
    {
        $livroExist = Livro::find($id);

        if ($livroExist) {

            if (Livro::find($id)->update($request->all())) {
                return response()->json(['message' => 'Livro Alterado com sucesso!'], 200);
            }

            return response()->json(['message' => 'Erro ao alterar livro!'], 404);
        }

        return response()->json(['message' => 'Livro não encontrado!'], 404);
    }


    public function destroy(string $id): JsonResponse
    {
        $result = Livro::destroy($id);

        if ($result) {
            return response()->json('Livro deletado com sucesso!', 200);
        }

        return response()->json('Erro ao deletar livro!', 404);
    }
}
