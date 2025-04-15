@extends('dashboard')
@section('title', 'Membre')

@section('extra-style')

@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow-lg mt-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Gestion des Membres</h3>
        </div>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('members.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i>Nouveau Membre
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Poste</th>
                            <th>Visible</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td><img src="{{ asset('storage/'.$member->photo) }}" width="80"></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->position }}</td>
                            <td>{{ $member->is_visible ? 'Oui' : 'Non' }}</td>
                            <td>
                                <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                   
                    </tbody>
                </table>
            </div>
            
         
        </div>
    </div>
</div>
@endsection