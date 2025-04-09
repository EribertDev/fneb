@extends('dashboard')
@section('title') Gestion des Événements @endsection


@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Gestion des Événements</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('admin.evenements.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Nouvel Événement
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Date/Heure</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evenements as $evenement)
                        <tr>
                            <td>{{ $evenement->titre }}</td>
                            <td>{{ $evenement->type }}</td>
                            <td>{{ $evenement->date_heure->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge 
                                    @if($evenement->statut === 'a_venir') bg-warning
                                    @elseif($evenement->statut === 'termine') bg-success
                                    @else bg-danger @endif">
                                    {{ ucfirst($evenement->statut) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.evenements.edit', $evenement) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.evenements.destroy', $evenement) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $evenements->links() }}
        </div>
    </div>
</div>
@endsection