@extends('layout')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow" style="max-width: 600px; width: 100%;">
            <div class="card-body">
                <h1 class="card-title mb-4 text-center">{{ $post->title }}</h1>
                <p class="card-text">{{ $post->content }}</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <a href="{{ route('index') }}" class="btn btn-secondary">Back to All Posts</a>
                    <a href="{{ route('edit', $post) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection