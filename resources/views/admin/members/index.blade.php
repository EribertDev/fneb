@extends('dashboard')
@section('title', 'Membre')

@section('extra-style')
<!-- CSS de SweetAlert2 (optionnel mais recommandé) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Script SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
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
            <div class="row mb-4">
                <div class="col d-flex justify-content-start">
                  <a href="{{ route('members.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> Nouveau Membre FNEB
                  </a>
                </div>
                <div class="col d-flex justify-content-end">
                  <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> Nouvel utilisateur
                  </a>
                </div>
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




<div class="container mt-4">
    <h3>Utilisateurs</h3>

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
                            <button type="submit"  class="btn btn-danger btn-delete">Supprimer</button>
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
     document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', (event) => {
      event.preventDefault();
      const form = event.target.closest('form');

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
          form.submit();
        }
      });
    });
  });

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