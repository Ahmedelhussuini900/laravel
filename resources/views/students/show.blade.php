@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Student Details</h1>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">{{ $student->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if($student->image)
                            <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="img-fluid rounded">
                        @else
                            <p class="text-muted">No Image Available</p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <ul class="list-unstyled">
                            <li><strong>Age:</strong> {{ $student->age }}</li>
                            <li><strong>Address:</strong> {{ $student->address }}</li>
                            <li><strong>Email:</strong> {{ $student->email }}</li>
                            <li><strong>Level:</strong> {{ $student->level }}</li>
                        </ul>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
