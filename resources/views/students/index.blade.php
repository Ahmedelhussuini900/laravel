@extends('layouts.app')

@section('title', 'Students List')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Students List</h1>

        <!-- Create Button -->
        <div class="mb-3">
            <a href="{{ route('students.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create Student
            </a>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Image</th>
                        {{-- <th>update_at</th>
                        <th>create_at</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->level }}</td>
                            <td>
                                @if($student->image)
                                    <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
