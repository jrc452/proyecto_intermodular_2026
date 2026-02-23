@extends('layouts.app')

@section('content')
    <h2>Mis reservas</h2>

    @foreach ($reservas as $reserva)
        <div class="card">
            <p><strong>Fecha:</strong> {{ $reserva->fecha }}</p>
            <p><strong>Hora:</strong> {{ $reserva->hora }}</p>
            <p><strong>Estado:</strong> {{ $reserva->estado }}</p>
        </div>
    @endforeach
@endsection
