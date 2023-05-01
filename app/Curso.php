<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'codigo',
        'valor'
    ];

    public function alunos() {
        return $this->belongsToMany(Aluno::class, 'aluno_curso');
    }
}
