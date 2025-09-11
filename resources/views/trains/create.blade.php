@extends('layouts.app')
@section('content')

    <h1>Cadastrar Treino:</h1>

    <form action="{{ route('create') }}" method="post">
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
            <input type="button" value="Cadastrar Treino">
        </div>
    </form>
    
@endsection