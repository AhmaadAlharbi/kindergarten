<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['grade', 'classroom', 'guardian'])->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $guardians = Guardian::all(); // Fetch guardians
        return view('students.create', compact('grades', 'classrooms', 'guardians'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'guardian_id' => 'required|exists:guardians,id',
    //         'grade_id' => 'required|exists:grades,id',
    //         'classroom_id' => 'required|exists:classrooms,id',
    //         'date_of_birth' => 'required|date',
    //         'civil_id' => 'nullable|string',
    //     ]);

    //     Student::create($request->all());
    //     return redirect()->route('students.index')->with('success', 'Student created successfully.');
    // }
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'civil_id' => 'nullable|string|max:12',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'guardian_id' => 'required|exists:guardians,id',
        ]);

        // Create new student
        Student::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'civil_id' => $validatedData['civil_id'],
            'address' => $validatedData['address'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'grade_id' => $validatedData['grade_id'],
            'classroom_id' => $validatedData['classroom_id'],
            'guardian_id' => $validatedData['guardian_id'],
        ]);

        // Redirect with success message
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $student;
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $guardians = Guardian::all(); // Fetch guardians
        return view('students.edit', compact('student', 'grades', 'classrooms', 'guardians'));
    }

    public function update(Request $request, $id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Validate incoming request data for updating a student
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'civil_id' => 'sometimes|nullable|string|max:50',
            'address' => 'sometimes|nullable|string|max:255',
            'grade_id' => 'sometimes|nullable|exists:grades,id',
            'classroom_id' => 'sometimes|nullable|exists:classrooms,id',
            'date_of_birth' => 'sometimes|nullable|date|date_format:Y-m-d',
        ]);

        // Update only the fields that are present in the request
        $student->update(array_filter($validatedData));

        // Redirect or return response
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }


    public function destroy($id)
    {
        try {
            // Find the student by ID
            $student = Student::findOrFail($id);

            // Delete the student
            $student->delete();

            // Return success response after deletion
            return response()->json(['success' => 'Student deleted successfully.'], 200);
        } catch (\Exception $e) {
            // Handle exception and return an error response
            return response()->json(['error' => 'There was an error deleting the student.'], 500);
        }
    }
}
