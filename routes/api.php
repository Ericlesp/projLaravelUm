<?php

use App\Http\Controllers\AlunoRegistrarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('/alunos', AlunoRegistrarController::class);

Route::post('/alunos', [AlunoRegistrarController::class, 'store']);
