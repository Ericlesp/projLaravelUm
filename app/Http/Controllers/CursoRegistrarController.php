<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoRegistrarController extends Controller
{
    private Curso $curso;

    public function __invoke(CursoRegistrarRequest $cursosRegistrarRequest) {}
}
