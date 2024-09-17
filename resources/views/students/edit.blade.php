<!-- resources/views/students/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Student</h1>

        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $student->age) }}" required>
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $student->address) }}" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Level -->
            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" id="level" name="level" required>
                    <option value="1 sec" {{ old('level', $student->level) == '1 sec' ? 'selected' : '' }}>1 sec</option>
                    <option value="2 sec" {{ old('level', $student->level) == '2 sec' ? 'selected' : '' }}>2 sec</option>
                    <option value="3 sec" {{ old('level', $student->level) == '3 sec' ? 'selected' : '' }}>3 sec</option>
                </select>
                @error('level')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if($student->image)
                    <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="img-fluid mt-2" width="100">
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.show', $student->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
