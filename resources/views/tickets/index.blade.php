@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Tickets</h2>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="flight_id" class="form-label">Flight</label>
            <select name="flight_id" id="flight_id" class="form-control" required>
                <option value="">-- Select Flight --</option>
                @foreach($flights as $flight)
                    <option value="{{ $flight->id }}">
                        {{ $flight->flight_number }} ({{ $flight->post->title ?? '-' }} → {{ $flight->destinationRelation->title ?? '-' }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="zone" class="form-label">Zone</label>
            <input type="text" name="zone" id="zone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="seat" class="form-label">Seat</label>
            <input type="text" name="seat" id="seat" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Book Ticket</button>
    </form>

    <hr>
    <h4 class="mt-4">All Tickets</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Flight</th>
                <th>Zone</th>
                <th>Seat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>
                        {{ $ticket->flight->flight_number ?? '-' }}
                        ({{ $ticket->flight->post->title ?? '-' }} → {{ $ticket->flight->destinationRelation->title ?? '-' }})
                    </td>
                    <td>{{ $ticket->zone }}</td>
                    <td>{{ $ticket->seat }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection