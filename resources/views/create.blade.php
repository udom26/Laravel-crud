@extends('layout')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h2 class="mb-4 text-center" style="color: #000000;">Create</h2>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Airport Name</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Detail</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('index') }}" class="btn btn-secondary">Back to All Airport</a>
                    <button type="submit" class="btn btn-primary">Add Airport</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection