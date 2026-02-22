@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Agenda de Reservas</h2>

        <div id="calendar"></div>
        <!-- Modal -->
        <div id="modalReserva" class="modal">
            <div class="modal-content">
                <h4>Editar Reserva</h4>
                <p id="modalTitulo"></p>

                <select id="estadoReserva">
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmada">Confirmada</option>
                    <option value="cancelada">Cancelada</option>
                    <option value="completada">Completada</option>
                </select>

                <button id="guardarEstado">Guardar</button>
                <button onclick="cerrarModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <script type="module">
        /*
        import {
            Calendar
        } from '@fullcalendar/core';
        import dayGridPlugin from '@fullcalendar/daygrid';
        import timeGridPlugin from '@fullcalendar/timegrid';
        import interactionPlugin from '@fullcalendar/interaction';

        document.addEventListener('DOMContentLoaded', function() {

            let calendarEl = document.getElementById('calendar');

            let calendar = new Calendar(calendarEl, {
                plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
                initialView: 'timeGridWeek',
                locale: 'es',
                events: '/admin/eventos',
                slotMinTime: "08:00:00",
                slotMaxTime: "21:00:00",
                allDaySlot: false,
                height: 700,
            });

            calendar.render();
        });
        */
        eventClick: function(info) {

            let modal = document.getElementById('modalReserva');
            modal.style.display = 'block';

            document.getElementById('modalTitulo').innerText = info.event.title;

            document.getElementById('guardarEstado').onclick = function() {

                let nuevoEstado = document.getElementById('estadoReserva').value;

                fetch(`/admin/reserva/${info.event.id}/estado`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            estado: nuevoEstado
                        })
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (data.success) {

                            let colores = {
                                confirmada: '#28a745',
                                pendiente: '#ffc107',
                                cancelada: '#dc3545',
                                completada: '#007bff'
                            };

                            info.event.setProp('color', colores[nuevoEstado]);
                            modal.style.display = 'none';
                        }
                    });
            };
        }

        function cerrarModal() {
            document.getElementById('modalReserva').style.display = 'none';
        }
    </script>
@endsection
