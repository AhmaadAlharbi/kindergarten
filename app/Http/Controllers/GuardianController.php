<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    // Display a listing of the guardians
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardians.index', compact('guardians'));
    }

    // Show the form for creating a new guardian
    public function create()
    {
        return view('guardians.create');
    }

    // Store a newly created guardian in the database
    public function store(Request $request)
    {
        $request->validate([
            'father_name' => 'required|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'father_email' => 'required|email|unique:guardians,father_email',
            'father_civil_id' => 'required|unique:guardians,father_civil_id',
            'father_address' => 'nullable|string|max:255',
            'father_job' => 'nullable|string|max:100',
            'mother_name' => 'required|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'mother_email' => 'required|email|unique:guardians,mother_email',
            'mother_civil_id' => 'required|unique:guardians,mother_civil_id',
            'mother_address' => 'nullable|string|max:255',
            'mother_job' => 'nullable|string|max:100',
        ]);

        Guardian::create($request->all());

        return redirect()->route('guardians.index')->with('success', 'Guardian created successfully.');
    }

    // Show the form for editing the specified guardian
    public function edit(Guardian $guardian)
    {
        return view('guardians.edit', compact('guardian'));
    }

    // Update the specified guardian in the database
    public function update(Request $request, Guardian $guardian)
    {
        $request->validate([
            'father_name' => 'required|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'father_email' => 'required|email|unique:guardians,father_email,' . $guardian->id,
            'father_civil_id' => 'required|unique:guardians,father_civil_id,' . $guardian->id,
            'father_address' => 'nullable|string|max:255',
            'father_job' => 'nullable|string|max:100',
            'mother_name' => 'required|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'mother_email' => 'required|email|unique:guardians,mother_email,' . $guardian->id,
            'mother_civil_id' => 'required|unique:guardians,mother_civil_id,' . $guardian->id,
            'mother_address' => 'nullable|string|max:255',
            'mother_job' => 'nullable|string|max:100',
        ]);

        $guardian->update($request->all());

        return redirect()->route('guardians.index')->with('success', 'Guardian updated successfully.');
    }

    // Remove the specified guardian from the database
    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return response()->json(['success' => 'Guardian deleted successfully.']);
    }
}