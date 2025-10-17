@extends('layouts.app')
@section('content')
    @auth
    <h1>Cadastre os exercicios relacionado ao treino selecionado: </h1>
    <div>
        <form action="{{ route('exercise.store') }}" method="post">
            @csrf
            <div>
                <label for="exercise_name">
                    <input type="text" placeholder="Nome do exercicio:">
                </label>
            </div>
            <div>
                <label for="series">
                    <input type="text" id="series" name="series" placeholder="N de séries:">
                </label>
            </div>
            <div>
                <label for="repetitions">
                    <input type="text" id="repetitions" name="repetitions" placeholder="N de repetições:">
                </label>
            </div>
            <div>
                <label for="weight">
                    <input type="text" id="weight" name="weight" placeholder="Peso:">
                </label>
            </div>
            <div>
                <label for="date">
                    <input type="date" id="date" name="date" placeholder="Data:">
                </label>
            </div>
            <div>
           <input type="submit" class="btn btn-primary" value="Criar exercício.">
            </div>
        </form>
    </div>
    @endauth
    @guest
        <h2>Você não está logado</h2>
        <a href="{{ route('loginForm') }}">Clique aqui para logar.</a>
    @endguest

@endsection