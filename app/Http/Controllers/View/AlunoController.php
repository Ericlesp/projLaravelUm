<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Aluno;
use App\Curso;

class AlunoController extends Controller
{
    public function index(){
        $aluno = Aluno::all();

        return view('alunos', ['alunos' => $aluno]);
    }
}
