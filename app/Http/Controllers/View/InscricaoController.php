<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Aluno;
use Illuminate\Http\Request;

class AdicionarAlunoController extends Controller
{
    public function create(Curso $curso)
    {
        $alunos = Aluno::all();

        return view('adicionar-aluno', compact('curso', 'alunos'));
    }

    public function store(Curso $curso, Request $request)
    {
        $request->validate([
            'aluno_id' => ['required', 'exists:alunos,id']
        ]);

        $curso->alunos()->attach($request->aluno_id);

        return redirect()->back()->with('success', 'Aluno adicionado ao curso com sucesso.');
    }
}
