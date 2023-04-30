<?php

use App\Http\Controllers\AlunoConsultaController;
use App\Http\Controllers\AlunoDeletaController;
use App\Http\Controllers\AlunoEditaController;
use App\Http\Controllers\AlunoRegistrarController;
use App\Http\Controllers\CursoRegistrarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('/alunos', AlunoRegistrarController::class);

Route::post('/alunos', [AlunoRegistrarController::class, 'store']);

Route::get('/alunos', [AlunoConsultaController::class, 'consulta']);

Route::delete('/alunos/{alunoId}', [AlunoDeletaController::class, 'deleta']);

Route::post('/alunos/{alunoId}', [AlunoEditaController::class, 'edita']);

Route::post('/cursos', [CursoRegistrarController::class, 'adiciona']);
