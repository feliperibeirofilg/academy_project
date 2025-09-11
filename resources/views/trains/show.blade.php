@extends('layouts.app')
@section('content')

    @forelse ($allTrains as $train)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $train->training }}</h5>
        </div>
    </div>

@endsection