@extends('dashboard')
@section('title', 'Create Poll')
@section('extra-style')
<style>
    .primary-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    }
    
    .form-control-lg {
        border-radius: 12px;
        padding: 1rem 1.5rem;
    }
    
    .input-group .btn {
        border-radius: 0 12px 12px 0;
    }
    
    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
    }
    </style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-3">
                <div class="card-header bg-primary-gradient text-white py-4">
                    <h2 class="h4 mb-0 text-primary">{{ isset($poll) ? 'Modifier' : 'Créer' }} un Sondage</h2>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ isset($poll) ? route('admin.polls.update', $poll) : route('admin.polls.store') }}">
                        @csrf
                        @isset($poll) @method('PUT') @endisset

                        <!-- Question -->
                        <div class="mb-4">
                            <label class="form-label fs-5 text-primary">Question du sondage</label>
                            <input type="text" name="question" 
                                   class="form-control form-control-lg @error('question') is-invalid @enderror" 
                                   value="{{ old('question', $poll->question ?? '') }}" 
                                   required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Options -->
                        <div class="mb-4">
                            <label class="form-label fs-5 text-primary">Options de réponse</label>
                            <div id="options-container">
                                @foreach(old('options', isset($poll) ? $poll->options->pluck('text') : ['']) as $index => $option)
                                <div class="input-group mb-2">
                                    <input type="text" name="options[]" 
                                           class="form-control @error('options.'.$index) is-invalid @enderror" 
                                           value="{{ $option }}" 
                                           required>
                                    @if($loop->first)
                                        <button class="btn btn-success" type="button" onclick="addOption()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-danger" type="button" onclick="removeOption(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    @endif
                                    @error('options.'.$index)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Paramètres -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fs-5 text-primary">Statut</label>
                                <select name="status" class="form-select">
                                    <option value="draft" {{ (old('status', $poll->status ?? '') === 'draft') ? 'selected' : '' }}>
                                        Brouillon
                                    </option>
                                    <option value="active" {{ (old('status', $poll->status ?? '') === 'active') ? 'selected' : '' }}>
                                        Actif
                                    </option>
                                    <option value="closed" {{ (old('status', $poll->status ?? '') === 'closed') ? 'selected' : '' }}>
                                        Fermé
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fs-5 text-primary">Date de fin</label>
                                <input type="datetime-local" name="end_at" 
                                       class="form-control" 
                                       value="{{ old('end_at', isset($poll->end_at) ? $poll->end_at->format('Y-m-d\TH:i') : '') }}">
                            </div>

                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" 
                                           name="is_public" id="is_public" 
                                           {{ old('is_public', $poll->is_public ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_public">
                                        Sondage public
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="{{ route('admin.polls.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Annuler
                            </a>
                            <button type="submit" class="btn btn-primary-gradient px-5 py-2">
                                {{ isset($poll) ? 'Mettre à jour' : 'Créer' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('extra-script')
<script>
    function addOption() {
        const container = document.getElementById('options-container');
        const newOption = document.createElement('div');
        newOption.className = 'input-group mb-2';
        newOption.innerHTML = `
            <input type="text" name="options[]" class="form-control" required>
            <button class="btn btn-danger" type="button" onclick="removeOption(this)">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newOption);
    }
    
    function removeOption(button) {
        button.closest('.input-group').remove();
    }
    </script>
@endsection