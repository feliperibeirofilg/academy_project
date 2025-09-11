@extends('layouts.app')
@section('content')
    @auth
    <h1>Cadastrar Treino:</h1>

    <form action="{{ route('trains.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="training" class="form-label">
                <input type="text" name="training" id="training" placeholder="Nome do exercicio">
            </label>
        </div>

        <div class="mb-3">
            <label for="weighy" class="form-label">
                <input type="text" name="weighy" id="weighy" placeholder="Peso:">
            </label>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">
                <input type="date" name="date" id="date" placeholder="Data:">
            </label>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Cadastrar Treino">
        </div>
    </form>
    @endauth
    @guest
        <h2>Você não estã logado</h2>
        <a href="{{ route('loginForm')}}">Clique aqui para logar.</a>
    @endguest
    @endsection