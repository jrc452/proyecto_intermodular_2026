@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <h2>✨ ¡Reserva confirmada!</h2>
            <p>
                Te esperamos el
                <strong>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</strong>
                a las
                <strong>{{ $reserva->hora }}</strong>
            </p>

            <a href="{{ route('home') }}" class="btn btn-primary">
                Volver al inicio
            </a>
        </div>
    </div>
@endsection
