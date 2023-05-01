<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Aluno;
use Illuminate\Http\Request;

class AdicionaAlunoController extends Controller
{
        public function adicionaAluno(Curso $curso, Request $request) {

            $request->validate([
                'aluno_id' => ['required', 'exists:alunos,id']
            ]);

            $curso->alunos()->attach($request->aluno_id);

        return response()->json(['mensagem' => 'Aluno adicionado ao curso com sucesso.']);
    }
}
