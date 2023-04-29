<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRegistrarRequest;
use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlunoRegistrarController extends Controller
{

    public function store(
        Request $request
    ) {
        $dadosAluno = $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'sobrenome' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:50'],
            'idade' => ['nullable', 'integer', 'min:1', 'max:999'],
        ]);

        $aluno = new Aluno();
        $aluno->nome = $dadosAluno['nome'];
        $aluno->sobrenome = $dadosAluno['sobrenome'];
        $aluno->email = $dadosAluno['email'];
        $aluno->idade = $dadosAluno['idade'];

        $aluno->save();
        //Aluno::create($dadosAluno);

        return response("", 204);
    }
}
