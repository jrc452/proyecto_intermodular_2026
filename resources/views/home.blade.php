<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>EstilizaCitas</title>    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    @include('partials.navbar')

    <main class="container">
        @yield('content')

        @extends('layouts.app')

        @section('content')
            <div class="card text-center">
                <h1>Bienvenido a EstilizaCitas 💇‍♀️</h1>
                <p>Reserva tu cita online de forma rápida y sencilla.</p>

                <a href="{{ route('reservas.crear') }}" class="btn btn-primary">
                    Reservar cita
                </a>
            </div>
        @endsection
    </main>

</body>

</html>
