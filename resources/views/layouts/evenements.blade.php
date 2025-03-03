@extends('master')
@section('title')
    Événements
@endsection
@section('extra-style')
<style>
    .fc-daygrid-day:hover {
        background: #f8f9fa !important;
        cursor: pointer;
    }
    
    .event-badge {
        background: #008751;
        color: white;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 0.8em;
    }
    
    #dailyEvents .list-group-item {
        border-left: 3px solid #008751;
        margin-bottom: 8px;
        transition: transform 0.2s;
    }
    
    #dailyEvents .list-group-item:hover {
        transform: translateX(5px);
    }

    .event-title {
       
        padding: 2px 0;
    }
    
    </style>

@endsection
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Événements</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('events')}}" >Événements</li>  
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Events Start -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Calendrier Mensuel -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0" id="currentMonth"></h3>
                            <div class="btn-group">
                                <button class="btn btn-light btn-sm" id="prevMonth"><i class="fas fa-chevron-left"></i></button>
                                <button class="btn btn-light btn-sm" id="nextMonth"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="monthCalendar"  class="bg-white rounded-3 shadow-lg" ></div>
                    </div>
                </div>
            </div>
    
            <!-- Événements du Jour Sélectionné -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                        <h3 class="mb-0" id="selectedDate">Événements du jour</h3>
                    </div>
                    <div class="card-body">
                        <div id="dailyEvents" class="list-group"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Events End -->









@endsection

@section('extra-script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const events = [
        {
            title: 'Réunion ',
            start: '2025-02-24T10:00:00',
            end: '2025-03-15T12:00:00',
            location: 'Salle B203',
            description: 'Préparation des élections universitaires'
        },
        {
            title: 'Atelier',
            start: '2025-02-24T14:00:00',
            end: '2025-03-15T17:00:00',
            location: 'Bibliothèque centrale',
            description: 'Avec M. Adébayo, expert en création d\'entreprise'
        }
    ];

    // Configuration Calendrier Mensuel
    const calendarEl = document.getElementById('monthCalendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: false,
        locale: 'fr',
        events: events,
        dateClick: function(info) {
            updateDailyEvents(info.date);
        },
        eventDidMount: function(arg) {
            arg.el.innerHTML = `
                <div class="d-flex align-items-center p-1">
                    <div class="event-badge me-2">${formatTime(arg.event.start)}</div>
                    <div class="event-title" >${arg.event.title}</div>
                </div>
                
            `;
        }
        
    });

    // Gestion Navigation
    document.getElementById('prevMonth').addEventListener('click', () => {
        calendar.prev();
        updateMonthHeader();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        calendar.next();
        updateMonthHeader();
    });

    // Mise à jour de l'interface
    function updateMonthHeader() {
        const currentDate = calendar.getDate();
        document.getElementById('currentMonth').textContent = 
            currentDate.toLocaleDateString('fr-FR', { month: 'long', year: 'numeric' });
    }

    function updateDailyEvents(date) {
        const selectedDate = date.toISOString().split('T')[0];
        const dailyEvents = events.filter(event => 
            event.start.startsWith(selectedDate)
        );

        const eventsHtml = dailyEvents.map(event => `
            <div class="list-group-item">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="mb-1">${event.title}</h5>
                        <small class="text-muted">${formatTime(event.start)} - ${formatTime(event.end)}</small>
                        <div class="mt-2">📍 ${event.location}</div>
                    </div>
                    <button class="btn btn-sm btn-outline-primary">+ Détails</button>
                </div>
                ${event.description ? `<p class="mt-2 mb-0">${event.description}</p>` : ''}
            </div>
        `).join('');
if (dailyEvents.length === 0) {
            document.getElementById('dailyEvents').innerHTML = `
                <div class="text-center text-muted">Aucun événement prévu pour le ${date.toLocaleDateString('fr-FR')}</div>
            `;
        } else {
            document.getElementById('dailyEvents').innerHTML = eventsHtml;
        }
        document.getElementById('selectedDate').textContent = 
            'Événements du ' + date.toLocaleDateString('fr-FR', { 
                weekday: 'long', 
                day: 'numeric', 
                month: 'long' 
            });
    }

    function formatTime(dateString) {
        const date = new Date(dateString);
        return date.toLocaleTimeString('fr-FR', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });
    }

    // Initialisation
    calendar.render();
    updateMonthHeader();
    updateDailyEvents(new Date());
});
</script>
@endsection