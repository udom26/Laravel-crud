@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4" style="color: #6c3483;">Book List</h2>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Book</th>
                    <th>Title</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $i => $book)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection