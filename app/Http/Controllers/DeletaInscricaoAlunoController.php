<?php

namespace App\Http\Controllers;


use App\AlunoCurso;

class DeletaInscricaoAlunoController extends Controller
{
        public function deleta($inscricaoId)
    {
        $inscricao = AlunoCurso::find($inscricaoId);

        if (!$inscricao) {
            return response()->json(['error' => 'Inscrição não encontrada'], 404);
        }

        $inscricao->delete();

        return response()->json(['success' => 'Inscrição removida com sucesso']);
    }
}
