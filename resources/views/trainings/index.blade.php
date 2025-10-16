@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Meus Treinos</h1>
        <a href="{{ route('trainings.create') }}" class="btn btn-primary">Adicionar Novo Treino</a>
    </div>

    @forelse ($trainings as $training)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $training->training }}</h5>
                <p class="card-text">
                    Data: {{ $training->date}}
                </p>
                
               
                <a href="{{ route('trainings.show', $training->id) }}" class="btn btn-info">
                    Ver Detalhes e Adicionar Exercícios
                </a>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            <p>Você ainda não cadastrou nenhum treino.</p>
        </div>
    @endforelse
</div>
@endsection