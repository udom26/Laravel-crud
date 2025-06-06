@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Ticket Detail</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Flight Number:</strong> {{ $ticket->flight->flight_number ?? '-' }}</p>
            <p><strong>From:</strong> {{ $ticket->flight->post->title ?? '-' }}</p>
            <p><strong>To:</strong> {{ $ticket->flight->destinationRelation->title ?? '-' }}</p>
            <p><strong>Zone:</strong> {{ $ticket->zone }}</p>
            <p><strong>Seat:</strong> {{ $ticket->seat }}</p>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection