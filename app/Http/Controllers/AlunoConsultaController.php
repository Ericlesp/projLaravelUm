<?php

namespace App\Http\Controllers;

use App\Aluno;

class AlunoConsultaController extends Controller
{

    public function consulta() {

        $alunos = Aluno::all();

        return response(['alunos' => $alunos], 200);
    }
}
