<!-- resources/views/students/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <h1>Create a New Student</h1>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>

        <!-- Age -->
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Enter age">
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>

        <!-- Level -->
        <div class="form-group">
            <label for="level">Level</label>
            <select class="form-control" id="level" name="level">
                <option value="1 sec">1 sec</option>
                <option value="2 sec">2 sec</option>
                <option value="3 sec">3 sec</option>
            </select>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
