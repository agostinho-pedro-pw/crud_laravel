<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Isso se significa que o idioma sera obtido apartir no iddeoma escolhido ou difinido no .env-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-02</title>
</head>

<body>
    <h1>Editar o usuario:</h1><br>
    {{--session('sucess')--}}
    {{--session('error')--}}
    {{--$errors->any()q--}}
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
    {{--{{ dd($user) }}--}}
    <ul>
        <a href="{{ route('index.user',['user'=> $user->id]) }}">_listar_</a>
    </ul><br>
    <form action="{{ route('update.user') }}" method="POST">
        @csrf {{--token de segurança, para evitar dados indesejados no nosso codigo--}}
        @method('PUT')
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name" placeholder="digite o seu nome completo"
            value="{{ old('name', $user->name) }}"><br><br>

        {{--value={{ old('name') }}--}}
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email" placeholder="digite o seu e-mail"
            value="{{ old('email', $user->email) }}"><br><br>

        <label for="textarea">Descrição: </label>

        <input type="textarea" name="description" id="description " placeholder="Insira uma descrição"
            value="{{ old('description',$user->description) }}"><br><br>

        <button type="submit">Salvar</button>

    </form>

</body>

</html>