<?php

namespace App\Http\Controllers;

use App\Models\Versao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VersaoController extends Controller
{
    public function index(): Response
    {
        return response(Versao::all(), 200);
    }

    public function store(Request $request): Response
    {
        return response(Versao::create($request->all(), 201));
    }

    public function show(string $id): Response
    {
        return response(Versao::find($id), 200);
    }

    public function update(Request $request, string $id): Response
    {
        return response(Versao::find($id)->update($request->all()));
    }

    public function destroy(string $id): Response
    {
        return response(Versao::destroy($id));
    }
}
