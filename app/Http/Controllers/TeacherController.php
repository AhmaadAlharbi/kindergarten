<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('teachers.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:teachers,email',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'department_id' => 'required|integer|exists:departments,id',
        ]);

        Teacher::create($request->all()); // Create a new teacher

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $departments = Department::all();

        return view('teachers.edit', compact('teacher', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'phone' => 'nullable',
            'description' => 'nullable',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json(['success' => 'Teacher deleted successfully.']);
    }
}