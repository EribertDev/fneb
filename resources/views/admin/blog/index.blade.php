@extends('dashboard')
@section('title', 'BlogIndex')

@section('extra-style')
<style>
    .posts-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
    }
    
    .posts-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    
    .posts-header h1 {
        color: #1A3D7C;
        font-size: 2.5rem;
        margin: 0;
    }
    
    .btn-primary {
        background: linear-gradient(to right, #1A3D7C, #4D8EFF);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        transition: opacity 0.3s;
    }
    
    .btn-primary:hover {
        opacity: 0.9;
    }
    
    .posts-filters {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        display: flex;
        gap: 1rem;
        align-items: center;
    }
    
    .filter-select {
        flex: 1;
        border: 2px solid #1A3D7C;
        border-radius: 8px;
        padding: 0.8rem;
        font-size: 1rem;
    }
    
    .status-filters {
        display: flex;
        gap: 0.5rem;
    }
    
    .status-btn {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        border: none;
        background: #f0f4f9;
        color: #1A3D7C;
        cursor: pointer;
    }
    
    .status-btn.active {
        background: #4D8EFF;
        color: white;
    }
    
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .post-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    
    .post-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .post-content {
        padding: 1.5rem;
    }
    
    .post-meta {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .status-badge {
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.9rem;
    }
    
    .status-badge.draft { background: #f0f4f9; color: #666; }
    .status-badge.published { background: #e3f2fd; color: #1A3D7C; }
    .status-badge.archived { background: #fff3e0; color: #ef6c00; }
    
    .category-badge {
        background: #1A3D7C;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.9rem;
    }
    
    .post-excerpt {
        color: #666;
        line-height: 1.6;
        margin: 1rem 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .post-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #eee;
        padding-top: 1rem;
    }
    
    .comments-count {
        color: #4D8EFF;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .post-actions {
        display: flex;
        gap: 1rem;
    }
    
    .edit-btn, .delete-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.2rem;
        padding: 0.3rem;
    }
    
    .edit-btn { color: #1A3D7C; }
    .delete-btn { color: #dc3545; }
    
    @media (max-width: 768px) {
        .posts-filters {
            flex-direction: column;
        }
        
        .filter-select {
            width: 100%;
        }
    }
    </style>
@endsection

@section('content')

<div class="posts-container">
    <div class="posts-header">
        <h1>Gestion des Articles</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn-primary">
            + Nouvel Article
        </a>
    </div>

    <div class="posts-filters">
        <select class="filter-select">
            <option>Toutes catégories</option>
            @foreach(['sante', 'academique', 'emploi', 'culture','logement','evenements','technology','autre'] as $category)
            <option>{{ ucfirst($category) }}</option>
            @endforeach
        </select>
        
        <div class="status-filters">
            @foreach(['draft', 'published', 'archived'] as $status)
            <button class="status-btn {{ $status === 'published' ? 'active' : '' }}">
                {{ ucfirst($status) }}
            </button>
            @endforeach
        </div>
    </div>

    <div class="posts-grid">
        @foreach($posts as $post)
        <div class="post-card">
            @if($post->image)
            <img src="{{ Storage::url($post->image) }}" class="post-image" alt="{{ $post->title }}">
            @endif
            
            <div class="post-content">
                <div class="post-meta">
                    <span class="status-badge {{ $post->status }}">{{ ucfirst($post->status) }}</span>
                    <span class="category-badge">{{ ucfirst($post->category) }}</span>
                </div>

                <h3>{{ $post->title }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                
                <div class="post-footer">
                    <div class="comments-count">
                        <i class="fas fa-comments"></i>{{ $post->comments_count }}
                    </div>
                    <div class="post-actions">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection