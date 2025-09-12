@extends('layouts.app')
@section('content')

    @forelse ($allTrainings as $training)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $training->training }}</h5>
            <p class="card-text">
                <strong>Peso:</strong> {{ $training->weighy }} kg <br>
                <strong>Data:</strong> {{ \Carbon\Carbon::parse($training->date)->format('d/m/Y')}}<br>
            </p>
        </div>
    </div>
    @empty
    <div class="alert alert-info">
        <p>Você ainda não cadastrou nenhum treino.</p>
    </div>
    @endforelse

@endsection