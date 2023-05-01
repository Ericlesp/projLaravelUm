<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'idade',
    ];

    public function cursos() {
        return $this->belongsToMany(Curso::class, 'aluno_curso');
    }

}
