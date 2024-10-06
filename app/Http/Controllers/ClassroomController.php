<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('grade')->get();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('classrooms.create', compact('grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
        ]);

        Classroom::create($request->all());
        return redirect()->route('classrooms.index')->with('success', 'Classroom created successfully.');
    }

    public function edit(Classroom $classroom)
    {
        $grades = Grade::all();
        return view('classrooms.edit', compact('classroom', 'grades'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $classroom->update($request->all());
        return redirect()->route('classrooms.index')->with('success', 'Classroom updated successfully.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Classroom deleted successfully.');
    }
}