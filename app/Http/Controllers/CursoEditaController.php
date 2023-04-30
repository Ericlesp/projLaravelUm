<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoEditaController extends Controller
{

    public function edita(Request $request, int $cursoId) {

        $dadosCurso = $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'descricao' => ['nullable', 'string', 'max:60'],
            'codigo' => ['required', 'string', 'max:50'],
            'valor' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $curso = Curso::find($cursoId);
        if (!$curso) {
            return response('Curso não encontrado.', 404);
        }

        $curso->nome = $dadosCurso['nome'];
        $curso->descricao = $dadosCurso['descricao'];
        $curso->codigo = $dadosCurso['codigo'];
        $curso->valor = $dadosCurso['valor'];

        $curso->save();

        return response('Curso atualizado com sucesso.', 200);
    }
}
