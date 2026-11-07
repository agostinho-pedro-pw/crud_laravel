<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Isso se significa que o idioma sera obtido apartir no iddeoma escolhido ou difinido no .env-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-02</title>
</head>

<body>
    <h1>Cadastrar o usuario:</h1><br>
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
    <ul>
        <a href="{{ route('index.user') }}">_listar_</a>
    </ul><br>
    <form action="{{ route('store.user') }}" method="POST">
        @csrf {{--token de segurança, para evitar dados indesejados no nosso codigo--}}
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name" placeholder="digite o seu nome completo"
            value="{{ old('name') }}"><br><br>

        {{--value={{ old('name') }}--}}
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email" placeholder="digite o seu e-mail"
            value="{{ old('email') }}"><br><br>
        <label for="password">Password: </label>

        <input type="password" name="password" id="password" placeholder="Insira a sua senha"
            value="{{ old('password') }}"><br><br>
        <label for="textarea">Descrição: </label>

        <input type="textarea" name="description" id="description " placeholder="Insira uma descrição"
            value="{{ old('description') }}"><br><br>
        <button type="submit">Enviar</button>

    </form>

</body>

</html>