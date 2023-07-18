<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = ['posicao', 'nome', 'abreviacao', 'testamento_id', 'versao_id'];

    public function testamento(string $id)
    {
        return Testamento::find($id);
    }

    public function versao(string $id)
    {
        return Versao::find($id);
    }
}
