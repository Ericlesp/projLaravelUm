<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos</title>
    <style type="text/css">
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h1>cursos</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrica</th>
                <th>Codigo</th>
                <th>Valor</th>
                <th>ID</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->descricao }}</td>
                    <td>{{ $curso->codigo }}</td>
                    <td>R$ {{ $curso->valor }}</td>
                    <td>{{ $curso->id }}</td>
                    <td>
                        <!-- <button type="button" class="btn btn-primary btn-editar-curso" data-toggle="modal" data-target="#editarModal">Editar</button> -->
                        <form action="{{ route('cursos.deleta', $curso->id) }}" method="POST">
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

    <h1>Cadastrar curso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cursos.store') }}">
        @csrf

        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}">
        </div>

        <div>
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" value="{{ old('descricao') }}">
        </div>

        <div>
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" value="{{ old('codigo') }}">
        </div>

        <div>
            <label for="valor">Valor</label>
            <input type="number" name="valor" step="0.01" value="{{ old('valor') }}">
        </div>

        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>
