<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retorna Alunos</title>
    <style type="text/css">
    </style>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->sobrenome }}</td>
                    <td>{{ $aluno->idade }}</td>
                    <td>{{ $aluno->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
