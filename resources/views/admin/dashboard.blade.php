@extends('master')

@section('title')
    Admin Dashboard
@endsection

@section('extra-style')

@endsection

@section('content')

<div class="container mt-4">
    <h1>Tableau de bord administrateur</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Créer un utilisateur</a>

    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Photo de profil</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle me-2" style="max-height:50px; " width="50">
                        @else
                            Aucune image
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning" onclick="showEditModal({{ $user->id }})">Modifier</button>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;" onsubmit="return confirmDel(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal pour modifier un utilisateur -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier l'utilisateur'</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input id="profile_picture" name="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror">
                    </div>
                    <div id="currentProfilePictureContainer" class="mt-3 d-flex justify-content-center" style="display: none;">
                        <img src="" alt="Photo de profil actuelle" id="currentProfilePicture" width="200">
                    </div>
                    <div class="container d-flex justify-content-center align-items-center mt-3">
                        <button type="submit" class="btn btn-primary center-block" style="width: auto;">Enregistrer les modifications</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-script')

<script>
    function confirmDel(event) {
        event.preventDefault(); //empêche le formulaire d'être soumis par défaut

        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: 'Cet utilisateur sera définitivement supprimé.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); //soumet le fromulaire si l'utilisateur confirme
            }
        })
    }

    function showEditModal(userId) {
        fetch(`/admin/users/${userId}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur réseau ou serveur');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('name').value = data.name;
                document.getElementById('role').value = data.role;
                document.getElementById('email').value = data.email;
                document.getElementById('password').value = data.password;
                //Afficher l'image actuelle si ellle existe
                if (data.profile_picture) {
                    document.getElementById('currentProfilePicture').src = `/storage/${data.profile_picture}`;
                    document.getElementById('currentProfilePictureContainer').style.display = 'block';
                } else {
                    document.getElementById('currentProfilePictureContainer').style.display = 'none';
                }

                document.getElementById('editForm').action = `/admin/users/${userId}`;
                var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des données :', error);
            });
    }
</script>

@endsection