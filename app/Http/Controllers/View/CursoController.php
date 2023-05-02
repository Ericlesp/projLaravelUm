<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{
    public function index(){
        $curso = Curso::all();

        return view('cursos', ['cursos' => $curso]);
    }
}
