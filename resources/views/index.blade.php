@extends('layout')

@section('content')

   

    <div class="container mt-4">
        <h1 class="mb-4">Airport</h1>
        <a href="{{ route('create') }}" class="btn btn-primary mb-3">Add Airport</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($posts->isEmpty())
            <div class="alert alert-info">
                No posts available
            </div>
        @else
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ $post->content }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('show', $post) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('edit', $post)}}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('You want to delete ?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection