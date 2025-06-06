@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0" style="color: #6c3483; font-weight: bold;">All Book</h1>
            <a href="{{ route('create') }}" class="btn btn-primary">Create Post</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($posts->isEmpty())
            <div class="alert alert-info">
                No posts available
            </div>
        @else
            @foreach($posts as $post)
                <div class="card mb-3 shadow-sm" style="border-left: 6px solid #d1c4e9;">
                    <div class="card-body">
                        <h3 class="card-title" style="color: #000000;">{{ $post->title }}</h3>
                        <p class="card-text" style="font-size: 1.1rem;">{{ $post->content }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('show', $post) }}" class="btn btn-outline-secondary">View</a>
                            <a href="{{ route('edit', $post)}}" class="btn btn-warning">Edit</a>
                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection