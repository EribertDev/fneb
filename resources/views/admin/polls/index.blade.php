@extends('dashboard')
@section('title', 'Index Poll')
@section('extra-style')
  
@endsection

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h2 class="text-anepes-red">Gestion des Sondages</h2>
    <a href="{{ route('admin.polls.create') }}" class="btn btn-gold">
        <i class="fas fa-plus"></i> Nouveau Sondage
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-anepes-beige">
                    <tr>
                        <th>Question</th>
                        <th>Statut</th>
                        <th>Date de fin</th>
                        <th>Votes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($polls as $poll)
                    <tr>
                        <td>{{ Str::limit($poll->question, 40) }}</td>
                        <td>
                            <span class="badge 
                                @if($poll->status === 'active') bg-success
                                @elseif($poll->status === 'closed') bg-danger
                                @else bg-secondary @endif">
                                {{ $poll->status }}
                            </span>
                        </td>
                        <td>{{ $poll->end_at ? $poll->end_at->format('d/m/Y H:i') : '-' }}</td>
                        <td>{{ $poll->total_votes }}</td>
                        <td>
                            <div class="d-flex gap-2">
                              
                                <form action="{{ route('admin.polls.destroy', $poll) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-archive"></i>
                                    </button>
                                </form>
                            
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $polls->links() }}
    </div>
</div>
</div>
@endsection


@section('extra-script')

@endsection