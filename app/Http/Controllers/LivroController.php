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
            return response()->json($livroExist);
        }

        return response()->json(['message' => 'Nenhum livro cadastrado!']);
    }


    public function store(Request $request): JsonResponse
    {
        $created = Livro::create($request->all());

        if ($created) {
            return response()->json(['message' => 'Livro cadastrado com sucesso!', 'content' => $request->all()]);
        }
        return response()->json(['message' => 'Não foi possivel cadastrar o Livro']);
    }


    public function show(string $id)
    {
        $livroExist = Livro::find($id);

        if ($livroExist) {
            return response()->json($livroExist);
        }

        return response()->json(['message' => 'Livro não encontrado!']);
    }


    public function update(Request $request, string $id)
    {
        $livroExist = Livro::find($id);

        if ($livroExist) {

            if (Livro::find($id)->update($request->all())) {
                return response()->json(['message' => 'Livro Alterado com sucesso!']);
            }

            return response()->json(['message' => 'Erro ao alterar livro!']);
        }

        return response()->json(['message' => 'Livro não encontrado!']);
    }


    public function destroy(string $id)
    {
        $result = Livro::destroy($id);

        if ($result) {
            return response()->json('Livro deletado com sucesso!');
        }

        return response()->json('Erro ao deletar livro!');
    }
}
