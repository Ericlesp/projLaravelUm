<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdicionarAlunoController extends Controller
{
        public function create()
    {
        $alunos = Aluno::all();
        $cursos = Curso::all();
        $inscricoes = $this->listarInscricoes();

        return view('adicionar-aluno', compact('alunos', 'cursos', 'inscricoes'));
    }

        private function listarInscricoes()
    {
        return DB::table('aluno_curso')
                        ->join('alunos', 'aluno_curso.aluno_id', '=', 'alunos.id')
                        ->join('cursos', 'aluno_curso.curso_id', '=', 'cursos.id')
                        ->select('alunos.nome as nome_aluno', 'cursos.nome as nome_curso', 'aluno_curso.id')
                        ->get();

    }


    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => ['required', 'exists:alunos,id'],
            'curso_id' => ['required', 'exists:cursos,id']
        ]);

        $aluno = Aluno::findOrFail($request->aluno_id);
        $curso = Curso::findOrFail($request->curso_id);

        $inscrito = $curso->alunos()->where('aluno_id', $aluno->id)->count();

        if ($inscrito > 0) {
            return redirect()->back()->withErrors(['Aluno já está inscrito no curso.']);
        }

        $curso->alunos()->attach($aluno);

        return redirect()->route('cursos.alunos.adicionar')->with('success', 'Aluno adicionado ao curso com sucesso.');
    }


}
