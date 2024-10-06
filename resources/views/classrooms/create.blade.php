@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="mb-0 fs-4">Create New Classroom</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('classrooms.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Classroom Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="grade_id" class="form-label">Grade</label>
                            <select class="form-select form-select-lg" id="grade_id" name="grade_id" required>
                                <option value="">Select Grade</option>
                                @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('classrooms.index') }}" class="btn btn-secondary btn-lg px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4">Create Classroom</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection