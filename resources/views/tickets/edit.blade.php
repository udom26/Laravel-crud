@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Ticket</h2>
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="flight_id" class="form-label">Flight</label>
            <select name="flight_id" id="flight_id" class="form-control" required>
                <option value="">-- Select Flight --</option>
                @foreach($flights as $flight)
                    <option value="{{ $flight->id }}" {{ $ticket->flight_id == $flight->id ? 'selected' : '' }}>
                        {{ $flight->flight_number }} ({{ $flight->post->title ?? '-' }} → {{ $flight->destinationRelation->title ?? '-' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="zone" class="form-label">Zone</label>
            <input type="text" name="zone" id="zone" class="form-control" value="{{ $ticket->zone }}" required>
        </div>

        <div class="mb-3">
            <label for="seat" class="form-label">Seat</label>
            <input type="text" name="seat" id="seat" class="form-control" value="{{ $ticket->seat }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection