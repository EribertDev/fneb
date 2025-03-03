@extends('master')
@section('title') Autre @endsection
@section('extra-style')
<style>
    .form-check-input:checked {
        transform: scale(1.2);
        transition: transform 0.2s ease;
    }
    
    .chart-container {
        max-width: 600px;
        margin: 0 auto;
    }
    
    #otherInput {
        transition: opacity 0.3s ease;
    }
    </style>
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Autre</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('autre')}}" >Autre</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Autre Start -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Formulaire de Sondage -->
                <div class="card shadow-lg mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Sondage : Quel est votre principal défi académique ?</h3>
                    </div>
                    <div class="card-body">
                        <form id="pollForm">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="option1" value="Accès aux ressources">
                                    <label class="form-check-label" for="option1">Accès aux ressources pédagogiques</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="option2" value="Transport">
                                    <label class="form-check-label" for="option2">Transport vers le campus</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="option3" value="Logement">
                                    <label class="form-check-label" for="option3">Problèmes de logement</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="otherOption" value="Autre">
                                    <label class="form-check-label" for="otherOption">Autre (précisez)</label>
                                </div>
                                <div id="otherInput" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control" placeholder="Votre réponse...">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Voter</button>
                        </form>
                    </div>
                </div>
    
                <!-- Graphique des Résultats -->
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Résultats en temps réel</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:400px;">
                            <canvas id="resultsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      

@endsection







@section('extra-script')
   
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Configuration initiale
let pollData = {
    "Accès aux ressources": 120,
    "Transport": 85,
    "Logement": 65,
    "Autre": 30
};

// Gestion de la case "Autre"
document.querySelectorAll('input[name="pollOption"]').forEach(input => {
    input.addEventListener('change', (e) => {
        document.getElementById('otherInput').style.display = 
            e.target.value === 'Autre' ? 'block' : 'none';
    });
});

// Initialisation du graphique
const ctx = document.getElementById('resultsChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: Object.keys(pollData),
        datasets: [{
            data: Object.values(pollData),
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b);
                        const value = context.raw;
                        const percentage = ((value * 100) / total).toFixed(1);
                        return `${context.label}: ${value} votes (${percentage}%)`;
                    }
                }
            }
        }
    }
});

// Gestion de la soumission
document.getElementById('pollForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const selectedOption = document.querySelector('input[name="pollOption"]:checked').value;
    const otherText = document.querySelector('#otherInput input').value;
    
    if(selectedOption === 'Autre' && !otherText) {
        alert('Veuillez préciser votre réponse');
        return;
    }

    // Enregistrement du vote (à remplacer par appel API en réel)
    pollData[selectedOption]++;
    
    // Mise à jour du graphique
    chart.data.labels = Object.keys(pollData);
    chart.data.datasets[0].data = Object.values(pollData);
    chart.update();

    // Réinitialisation du formulaire
    this.reset();
    document.getElementById('otherInput').style.display = 'none';
});
</script>

       
@endsection