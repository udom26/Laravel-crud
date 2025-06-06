@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Flight</h2>
    <form action="{{ route('flights.update', $flight->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="airport_id" class="form-label">Airport</label>
            <select name="airport_id" id="airport_id" class="form-control" required>
                <option value="">-- Select Airport --</option>
                @foreach($posts as $post)
                    <option value="{{ $post->id }}" {{ $flight->airport_id == $post->id ? 'selected' : '' }}>
                        {{ $post->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="flight_number" class="form-label">Flight Number</label>
            <input type="text" name="flight_number" id="flight_number" class="form-control" value="{{ $flight->flight_number }}" required>
        </div>

        <div class="mb-3">
            <label for="destination_airport_id" class="form-label">Destination Airport</label>
            <select name="destination_airport_id" id="destination_airport_id" class="form-control" required>
                <option value="">-- Select Destination Airport --</option>
                @foreach($posts as $post)
                    <option value="{{ $post->id }}" {{ $flight->destination_airport_id == $post->id ? 'selected' : '' }}>
                        {{ $post->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('flights.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection