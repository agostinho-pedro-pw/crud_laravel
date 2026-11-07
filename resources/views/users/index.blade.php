<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Isso se significa que o idioma sera obtido apartir no iddeoma escolhido ou difinido no .env-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-02</title>
    <style>
        .edit {
            margin-left: 700px;
        }
    </style>
</head>

<body>
    <h1>Listar Usuários</h1><br>
    {{--session('sucess')--}}
    {{--session('error')--}}
    {{--$errors->any()--}}
    {{--$errors->all()--}}
    {{--old('name')--}}
    {{--old('email')--}}
    {{--old('password')--}}
    {{--old('description')--}}
    <div class="edit">
        <a style="margin-right" href="{{ route('welcome') }}">_home_</a>
        <a href="{{ route('create.user') }}">_cadastrar_</a>
    </div>
    {{-- {{ dd($users) }} --}}
    <table>
        <thead>
            <tr>
                <th style="padding: 12px 40px">ID</th>
                <th style="padding: 14px 40px">Nome</th>
                <th style="padding: 14px 40px">E-mail</th>
                <th style="padding: 14px 40px">Descrição</th>
                <th style="padding: 14px 40px">Acções</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->description }}</td>
                <td>
                    <a href="#">Visualizar</a>
                    <a href="#">Editar</a>
                    <a href="#">Apagar</a>
                </td>
            </tr>
            @empty
            <p style="color:#086">
                Não foi encontrado nenhum regristro!</p>
            @endforelse
        </tbody>
    </table>
    {{--
    usando a paginaçao
    <div>
        {{ $users->links() }}
    </div>--}}
</body>

</html>