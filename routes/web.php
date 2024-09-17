<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Display all students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Show the form for creating a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Store a newly created student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Show a single student
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Show the form for editing the student
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Update the student in the database
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

// Delete the student from the database
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
