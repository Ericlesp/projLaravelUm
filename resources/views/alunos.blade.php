<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alunos</title>
    <style type="text/css">
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h1>Alunos</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>E-mail</th>
                <th>ID</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->sobrenome }}</td>
                    <td>{{ $aluno->idade }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->id }}</td>
                    <td>
                        <!-- <button type="button" class="btn btn-primary btn-editar-aluno" data-toggle="modal" data-target="#editarModal">Editar</button> -->
                        <form action="{{ route('alunos.deleta', $aluno->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h1>Cadastrar Aluno</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf

        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}">
        </div>

        <div>
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" value="{{ old('sobrenome') }}">
        </div>

        <div>
            <label for="idade">Idade</label>
            <input type="number" name="idade" value="{{ old('idade') }}">
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <button type="submit">Cadastrar</button>
    </form><br>
</body>
</html>
