<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IdiomaController extends Controller
{
    public function index() : Response
    {
        return response(Idioma::all(), 200);
    }

    public function store(Request $request) : Response
    {
        return response(Idioma::create($request->all()), 201);
    }

    public function show(string $id) : Response
    {
        return response(Idioma::find($id), 200);
    }

    public function update(Request $request, string $id): Response
    {
        return response(Idioma::find($id)->update($request->all()), 200);
    }

    public function destroy(string $id): Response
    {
        return response(Idioma::destroy($id), 200);
    }
}
