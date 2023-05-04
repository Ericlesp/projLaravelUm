<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Aluno em Curso</title>
    <style type="text/css">
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h1>Adicionar Aluno em Curso</h1>


    <form method="POST" action="{{ route('adiciona.aluno') }}">
        @csrf

        <div>
            <label for="aluno_id">Aluno</label>
            <select name="aluno_id">
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="curso_id">Curso</label>
            <select name="curso_id">
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if (session()->has('errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach (session()->get('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Adicionar Aluno</button>
    </form>

    <hr>

    <div class="container border text-center">
        <h1>Inscricoes</h1>
        <table border="0" width="900" align="center" class="table">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscricoes as $inscrito)
                    <tr>
                        <td>{{ $inscrito->nome_aluno }}</td>
                        <td>{{ $inscrito->nome_curso }}</td>
                        <td>
                            <form action="{{ route('inscricao.deleta', $inscrito->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
