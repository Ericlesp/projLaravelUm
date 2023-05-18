<?php

use App\Http\Controllers\AdicionarAlunoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cursos', "View\CursoController@index");

Route::get('/alunos', "View\AlunoController@index");

Route::get('/adiciona-aluno', "AdicionaAlunoController@adicionaAluno");

//Route::get('/inscricoes', 'View\InscricaoController@adicionarAluno')->name('cursos.adicionar-aluno');

Route::get('/cursos/inscricao/alunos/adicionar', [AdicionarAlunoController::class, 'create'])->name('cursos.alunos.adicionar');

Route::post('/cursos/inscricao/alunos/adicionar', [AdicionarAlunoController::class, 'store'])->name('cursos.alunos.store');

// Route::get('/inscricoes', function () {
//     return view('inscricoes');
// });

Route::fallback(function(){
    echo 'Página não existe. <a href="'.route('site.index').'">Voltar ao inicio</a>';
});
