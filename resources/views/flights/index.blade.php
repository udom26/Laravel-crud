@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Flight List</h2>
    <a href="{{ route('flights.create') }}" class="btn btn-primary mb-3">Add Flight</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Flight Number</th>
                <th>Destination</th>
                <th>Airport</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($flights as $i => $flight)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->destinationRelation ? $flight->destinationRelation->title : '-' }}</td>
                    <td>{{ $flight->post ? $flight->post->title : '-' }}</td> <!-- Airport -->
                    <td>
                        <a href="{{ route('flights.show', $flight) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('flights.edit', $flight) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('flights.destroy', $flight) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('You want to delete ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No flights found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection