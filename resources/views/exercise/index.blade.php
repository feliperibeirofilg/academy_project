@extends('layouts.app')
@section('content')
<h1>Lista de Exercícios</h1>

<ul>
    @forelse ($exercises as $exercise)
        <li>{{ $exercise->exercise_name }} teste</li>
    @empty
        <li>Nenhum exercício cadastrado.</li>
    @endforelse
</ul>

<a href="{{ route('exercise.create') }}">Adicionar Novo Exercício</a>
@endsection