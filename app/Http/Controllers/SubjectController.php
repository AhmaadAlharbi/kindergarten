<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('teachers', 'department')->get(); // Fetch all subjects with related teacher and grade
        return view('subjects.index', compact('subjects'));
    }
    public function create()
    {
        // Fetch departments for the select dropdown
        $departments = Department::all();
        return view('subjects.create', compact('departments'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'description' => 'required|string|max:1000',
        ]);

        // Create a new subject
        Subject::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }
    public function edit($id)
    {
        $departments = Department::all();
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject', 'departments'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'description' => 'nullable|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->only('name', 'department_id', 'description'));

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }
    public function destroy($id)
    {
        try {
            // Find the subject by ID
            $subject = Subject::findOrFail($id);

            // Delete the subject
            $subject->delete();

            // Return a JSON response
            return response()->json(['success' => 'Subject deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the subject.'], 500);
        }
    }
}