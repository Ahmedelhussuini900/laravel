<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of the students
    public function index()
    {
        $students = student::paginate(5);
        // $students = student::all(); // Retrieve all students (or use pagination if needed)
        return view('students.index', compact('students'));
    }
    

    // Show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created student in the database
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'nullable|string|unique:students,name',
        'age' => 'required|integer',
        'address' => 'required|string',
        'email' => 'nullable|email|unique:students,email',
        'level' => 'required|in:1 sec,2 sec,3 sec',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('student_images', 'public');
    }

    // Create a new student record
    $student = new student();
    $student->name = $request->name;
    $student->age = $request->age;
    $student->address = $request->address;
    $student->email = $request->email;
    $student->level = $request->level;
    $student->image = $imagePath;
    $student->save();

    // Redirect or return a response
    return redirect()->route('students.index')->with('success', 'Student created successfully!');
}

    // Show a single student
    public function show($id)
    {
        $student = student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Show the form for editing the student
    public function edit($id)
    {
        $student = student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update the student in the database
    // In StudentController.php

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'address' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'level' => 'required|in:1 sec,2 sec,3 sec',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $student = Student::findOrFail($id);
    $student->name = $request->input('name');
    $student->age = $request->input('age');
    $student->address = $request->input('address');
    $student->email = $request->input('email');
    $student->level = $request->input('level');

    if ($request->hasFile('image')) {
        // Remove old image if exists
        if ($student->image && Storage::exists('public/' . $student->image)) {
            Storage::delete('public/' . $student->image);
        }

        // Store new image
        $student->image = $request->file('image')->store('students', 'public');
    }

    $student->save();

    return redirect()->route('students.show', $student->id)->with('success', 'Student updated successfully');
}
public function destroy($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Delete the image if it exists
        if ($student->image && Storage::exists('public/' . $student->image)) {
            Storage::delete('public/' . $student->image);
        }

        // Delete the student record from the database
        $student->delete();

        // Redirect to the index page with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

}
