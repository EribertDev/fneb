@extends('dashboard')
@section('title', 'Update Membre')
@section('extra-style')

@endsection

@section('content')


<div class="container-fluid">
    <div class="card shadow-lg mt-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Modifier les Infos </h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('members.update', $member) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nom complet</label>
                    <input type="text" name="name" value="{{old('name',$member->name ?? '')}}" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" id="phone" value="{{old('phone',$member->phone ?? '')}}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{old('email',$member->email ?? '')}}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Poste</label>
                    <input type="text" name="position" value="{{old('position',$member->position ?? '')}}" class="form-control" required>
                  
                </div>
                
                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" >
                    @if (isset($member) && ($member->photo) )
                        <div class="mt-2">
                            <img src="{{asset('storage/'.$member->photo)}}" alt="Photo" style="max-height: 200px;">
                        </div>
                    @endif
                </div>
                
                <div class="mb-3 form-check">
                    

                    <input type="checkbox" name="is_visible" value="1" class="form-check-input" 
           {{ old('is_visible', isset($post) ? $post->is_visible : false) ? 'checked' : '' }}>
   
                    <label class="form-check-label">Visible sur l'accueil</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

@endsection

