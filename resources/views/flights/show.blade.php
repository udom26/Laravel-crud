@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Flight Detail</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
            <p><strong>Airport:</strong> {{ $flight->post ? $flight->post->title : '-' }}</p>
            <p><strong>Destination:</strong> {{ $flight->destinationRelation ? $flight->destinationRelation->title : '-' }}</p>
            <a href="{{ route('flights.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection