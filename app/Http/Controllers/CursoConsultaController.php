<?php

namespace App\Http\Controllers;

use App\Curso;

class CursoConsultaController extends Controller
{

    public function consulta() {

        $curso = Curso::all();

        return response(['curso' => $curso], 200);
    }
}
