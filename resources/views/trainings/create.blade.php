@extends('layouts.app')
@section('content')
    @auth
    <h1>Cadastrar Treino:</h1>

    <form action="{{ route('trainings.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <select name="training" required='required' class="form-select">
                <option value="">Selecione um grupo muscular</option>
                <option value="Ombro">Ombro</option>
                <option value="Biceps">Biceps</option>
                <option value="Triceps">Triceps</option>
                <option value="Costas">Costas</option>
                <option value="Quadriceps">Quadriceps</option>
                <option value="Posterior">Posterior</option>
            </label>
        </div>

        <div>
           <input type="submit" class="btn btn-primary" value="Criar treino">
        </div>
    </form>
    
    @endauth
    @guest
        <h2>Você não está logado</h2>
        <a href="{{ route('loginForm') }}">Clique aqui para logar.</a>
    @endguest
    @endsection