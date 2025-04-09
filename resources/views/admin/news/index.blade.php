@extends('dashboard')
@section('title', 'News')

@section('extra-style')

@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow-lg mt-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Gestion des Actualités</h3>
        </div>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('admin.actualites.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Nouvelle Actualité
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Titre</th>
                            <th>type</th>
                            <th>Statut </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actualites as $actualite)
                        <tr>
                            <td>{{ $actualite->titre }}</td>
                            <td>
                                <span class="badge bg-{{ $actualite->type == 'event' ? 'warning' : 'info' }}">
                                    {{ $actualite->type }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $actualite->status == 'published' ? 'success' : 'secondary' }}">
                                    {{ $actualite->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.actualites.edit', $actualite) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.actualites.destroy', $actualite) }}" method="POST" class="d-inline">
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
            
            {{ $actualites->links() }}
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection