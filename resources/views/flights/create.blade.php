@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add Flight</h2>
    <form action="{{ route('flights.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="airport_id" class="form-label">Airport</label>
            <select name="airport_id" id="airport_id" class="form-control" required>
                <option value="">-- Select Airport --</option>
                @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="flight_number" class="form-label">Flight Number</label>
            <input type="text" name="flight_number" id="flight_number" class="form-control" required>
        </div>


        <div class="mb-3">
            <label for="destination_airport_id" class="form-label">Destination Airport</label>
            <select name="destination_airport_id" id="destination_airport_id" class="form-control" required>
                <option value="">-- Select Destination Airport --</option>
                @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('flights.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection