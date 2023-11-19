@extends('layouts.master')
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<head>
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/GIF.css') }}">
</head>    
<body class="background-gif-1">
   <div class="login-form">
        <form action="{{ url('recibe-login')}}" method="post">
            @csrf
            <div class="form-control">
                <label for="username">Nombre de Administrador:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-control">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Iniciar sesión</button>
        </form>
    </div>
</body>   
@stop    