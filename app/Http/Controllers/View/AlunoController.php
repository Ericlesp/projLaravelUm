<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Aluno;

class AlunoController extends Controller
{
    public function index(){
        $aluno = Aluno::all();

        return view('alunos', ['alunos' => $aluno]);
    }
}
