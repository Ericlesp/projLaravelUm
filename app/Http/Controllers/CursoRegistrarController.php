<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoRegistrarController extends Controller
{
    public function adiciona(
        Request $request
    ) {
        $dadosCurso = $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'descricao' => ['nullable', 'string', 'max:60'],
            'codigo' => ['required', 'string', 'max:50'],
            'valor' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $curso = new Curso();
        $curso->nome = $dadosCurso['nome'];
        $curso->descricao = $dadosCurso['descricao'];
        $curso->codigo = $dadosCurso['codigo'];
        $curso->valor = $dadosCurso['valor'];

        $curso->save();

        return response("", 200);
    }
}
