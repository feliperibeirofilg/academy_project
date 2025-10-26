@extends('layouts.app')
@section('content')

    <h1>
    Treino de {{ $training->name }} 
    @if ($training->date)
        ({{ $training->date->format('d/m/Y') }})
    @endif
    </h1>
    <hr>
    <h3>Adicionar Exercício</h3>

    <form action="{{ route('exercise.store', $training->id) }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome do Exercício">
        <input type="number" name="series" placeholder="Séries">
        <input type="number" name="repetitions" placeholder="Repetições">
        <input type="text" name="weight" placeholder="Peso (kg)">

        <button type="submit">Adicionar</button>
    </form>

    <hr>
    <h3>Exercícios do Treino</h3>
    @forelse ($training->exercises as $exercise)
        <p>
            <strong>{{ $exercise->name }}</strong>: 
            {{ $exercise->pivot->series }}x{{ $exercise->pivot->repetitions }} com {{ $exercise->pivot->weight }}kg
        </p>
    @empty
        <p>Nenhum exercício adicionado a este treino ainda.</p>
    <div class="alert alert-info">
        <p>Você ainda não cadastrou nenhum treino.</p>
    </div>
    @endforelse

@endsection