<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Isso se significa que o idioma sera obtido apartir no iddeoma escolhido ou difinido no .env-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-02</title>
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
    @if(session('sucess'))
    <p style="color: #086">
        {{ session('sucess' )}}
    </p>
    @endif
    @if( session('error') )
    <p style="color: rgb(221, 28, 17)">
        {{ session('error') }}
    </p>
    @endif
    {{--usando a validação de campos com o Request --}}
    @if($errors->any())
    @foreach($errors->all() as $error)
    <p style="color: rgb(221, 28, 17)">
        {{ $error }} </p>
    @endforeach
    @endif
    <ul>
        <a style="margin-left:550px" href="{{ route('create.user') }}">_home_</a>
    </ul>
    {{-- {{ dd($user) }} --}}
    <table>
        <thead>
            <tr>
                <th style="padding: 12px 20px">ID</th>
                <th style="padding: 12px 20px">Nome</th>
                <th style="padding: 12px 20px">E-mail</th>
                <th style="padding: 12px 20px">Descrição</th>
                <th style="padding: 12px 20px">Acções</th>
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