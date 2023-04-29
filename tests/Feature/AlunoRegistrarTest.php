<?php

namespace Tests\Feature;

use Tests\TestCase;

class AlunoRegistrar extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCadastroAluno()
    {
        $aluno = [
            'nome' => 'João',
            'sobrenome' => 'Silva',
            'email' => 'joao.silvae@xample.com',
            'idade' => 25
        ];

        $response = $this->post('/api/alunos', $aluno);

        $response->assertStatus(204);

        $this->assertDatabaseHas('alunos', $aluno);
    }
}
