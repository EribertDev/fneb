@extends('dashboard')

@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid">
    <!-- Stats -->
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-3 mt-4">
            <div class="card card-fneb">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary p-3 rounded-circle me-3">
                            <i class="fas fa-users fa-2x text-white"></i>
                        </div>
                        <div>
                            <h2 class="mb-0">24.5K</h2>
                            <small class="text-muted">Membres actifs</small>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 6px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Plus de stats -->
    </div>

    <!-- Graphiques -->
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card card-fneb">
                <div class="card-header border-0">
                    <h3 class="card-title">Activité des membres</h3>
                </div>
                <div class="card-body">
                    <canvas id="membersChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Dernières inscriptions -->
    <div class="row">
        <div class="col-12">
            <div class="card card-fneb">
                <div class="card-header">
                    <h3 class="card-title">Dernières inscriptions</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Université</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Koffi Adéwalé</td>
                                    <td>Université d'Abomey-Calavi</td>
                                    <td><span class="badge bg-success">Actif</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-fneb">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart initialization
    const ctx = document.getElementById('membersChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai'],
            datasets: [{
                label: 'Nouveaux membres',
                data: [65, 59, 80, 81, 56],
                backgroundColor: 'rgba(37, 99, 235, 0.2)',
                borderColor: '#2563eb',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection