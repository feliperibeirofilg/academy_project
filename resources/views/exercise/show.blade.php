@extends('layout.app')
@section('content')

    <div class="container">
        <h1>Detalhes do Exercício</h1>

        <div class="card">
            <div class="card-header">
                {{-- Dados da tabela 'exercises' --}}
                <h2>{{ $exercise->name }}</h2>
            </div>
            <div class="card-body">
                @if ($exercise->pivot)
                    {{-- Dados da tabela pivot 'name' --}}
                    <p><strong>Séries:</strong> {{ $exercise->pivot->series }}</p>
                    <p><strong>Repetições:</strong> {{ $exercise->pivot->repetitions }}</p>
                    <p><strong>Peso:</strong> {{ $exercise->pivot->weight }} kg</p>
                    <p><strong>Data do Treino:</strong> {{ \Carbon\Carbon::parse($exercise->pivot->date)->format('d/m/Y') }}</p>
                @else
                    <p>Este exercício não tem detalhes de treino associados.</p>
                @endif
            </div>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection