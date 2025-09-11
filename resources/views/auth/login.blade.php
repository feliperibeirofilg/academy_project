@extends('layouts.app')
@section('content')

    <h1>Login:</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('login')}}" method="post">
    @csrf    
        <div class="mb-3">
            <label for="email" class="form-label">
                <input type="text" name="email" id="email" placeholder="Email cadastrado:">
            </label>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                <input type="password" name="password" id="password" placeholder="Senha:">
            </label>
        </div>
        
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <t1>Não tem conta?</t1>
        <a href="{{ route('viewForm') }}" class='nav-link'>Criar Usuário</a>
    </form>

@endsection