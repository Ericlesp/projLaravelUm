<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos</title>
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/estilo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container">
            <div id="logo">
                <img src="logo.png" alt="">
            </div>

            <div id="menu">
                <a href="/">Home</a>
                <a href="/alunos">Cadastro de alunos</a>
                <a href="/cursos">Cadastro de cursos</a>
                <a href="/cursos/inscricao/alunos/adicionar">Inscricoes</a>
                </a>
            </div>
        </div>
    </header><br>
    <div class="container border text-center">
        <h1>Cursos</h1>
        <table border="0" width="900" align="center" class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
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
            
        <div class="d-flex flex-column align-items-center row center text-center">
            <form class="col-sm-4 mx-auto" method="POST" action="{{ route('cursos.store') }}">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome</label><br>
                    <input class="form-control" type="text" name="nome" value="{{ old('nome') }}">
                </div>

                <div class="form-group">
                    <label for="descricao">Descricao</label><br>
                    <input class="form-control" type="text" name="descricao" value="{{ old('descricao') }}">
                </div>

                <div class="form-group">
                    <label for="codigo">Codigo</label><br>
                    <input class="form-control" type="text" name="codigo" value="{{ old('codigo') }}">
                </div>

                <div class="form-group">
                    <label for="valor">Valor</label><br>
                    <input class="form-control" type="number" name="valor" step="0.01" value="{{ old('valor') }}"><br>
                    <br>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form><br>
        </div>
    </div><
    <footer>Desenvolvido por Ericles Pereira</footer>
</body>
</html>
