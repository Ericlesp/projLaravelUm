<?php

use App\Http\Controllers\AdicionaAlunoController;
use App\Http\Controllers\AlunoConsultaController;
use App\Http\Controllers\AlunoDeletaController;
use App\Http\Controllers\AlunoEditaController;
use App\Http\Controllers\AlunoRegistrarController;
use App\Http\Controllers\CursoConsultaController;
use App\Http\Controllers\CursoDeletaController;
use App\Http\Controllers\CursoEditaController;
use App\Http\Controllers\CursoRegistrarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('/alunos', AlunoRegistrarController::class);

Route::post('/alunos', [AlunoRegistrarController::class, 'store'])->name("alunos.store");

Route::get('/alunos', [AlunoConsultaController::class, 'consulta']);

Route::delete('/alunos/{alunoId}', [AlunoDeletaController::class, 'deleta'])->name("alunos.deleta");

Route::post('/alunos/{alunoId}', [AlunoEditaController::class, 'edita']);

Route::post('/cursos', [CursoRegistrarController::class, 'adiciona'])->name("cursos.store");

Route::get('/cursos', [CursoConsultaController::class, 'consulta']);

Route::delete('/cursos/{cursoId}', [CursoDeletaController::class, 'deleta'])->name("cursos.deleta");

Route::post('/cursos/{cursoId}', [CursoEditaController::class, 'edita']);

Route::post('/cursos/{curso}/alunos', [AdicionaAlunoController::class, 'adicionaAluno']);
