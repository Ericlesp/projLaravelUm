<?php

namespace App\Http\Controllers;

use App\Aluno;

class AlunoDeletaController extends Controller
{

    public function deleta(int $alunoId) {

        $aluno = Aluno::find($alunoId);
        if (!$aluno) {
            return response('Aluno não encontrado.', 404);
        }

        $aluno->delete();

        return response('Aluno deletado com sucesso.', 200);
    }
}
