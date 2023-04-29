<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoEditaController extends Controller
{

    public function edita(Request $request, int $alunoId) {

        $dadosAluno = $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'sobrenome' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:50'],
            'idade' => ['nullable', 'integer', 'min:1', 'max:999'],
        ]);

        $aluno = Aluno::find($alunoId);
        if (!$aluno) {
            return response('Aluno não encontrado.', 404);
        }
        
        $aluno->nome = $dadosAluno['nome'];
        $aluno->sobrenome = $dadosAluno['sobrenome'];
        $aluno->email = $dadosAluno['email'];
        $aluno->idade = $dadosAluno['idade'];

        $aluno->save();

        return response('Aluno atualizado com sucesso.', 200);
    }
}
