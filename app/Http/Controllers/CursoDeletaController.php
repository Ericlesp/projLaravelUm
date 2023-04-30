<?php

namespace App\Http\Controllers;

use App\Curso;

class CursoDeletaController extends Controller
{

    public function deleta(int $cursoId) {

        $curso = Curso::find($cursoId);
        if (!$curso) {
            return response('Curso não encontrado.', 404);
        }

        $curso->delete();

        return response('Curso deletado com sucesso.', 200);
    }
}
