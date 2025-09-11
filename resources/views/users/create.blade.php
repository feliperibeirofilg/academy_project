@extends('layouts.app')
@section('content')

<h1>Faça o seu cadastro:</h1>
<div class="navbar">
    <form action="{{ route('create') }}" method="post" class="form-control">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">
                <input type="text" name='name' id='name' placeholder='Nome completo:'>
            </label>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">
                <input type="text" name='email' id='email' placeholder='Email:'>
            </label>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">
                <input type="password" name='password' id='password' placeholder='Senha:'>
            </label>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Criar usuário">
        </div>
    </form>
</div>

@endsection