@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white shadow-sm rounded p-4 mt-5">
            <h2 class="text-primary text-center mb-4">Edit Student</h2>
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $student->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="text-secondary mt-4 mb-3 pb-2 border-bottom">Guardian Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="father_name" class="form-label">Father's Name</label>
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                id="father_name" name="father_name"
                                value="{{ old('father_name', $student->guardian->father_name ?? '') }}" readonly>
                            @error('father_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="father_phone" class="form-label">Father's Phone</label>
                            <input type="text" class="form-control @error('father_phone') is-invalid @enderror"
                                id="father_phone" name="father_phone"
                                value="{{ old('father_phone', $student->guardian->father_phone ?? '') }}">
                            @error('father_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="father_email" class="form-label">Father's Email</label>
                            <input type="email" class="form-control @error('father_email') is-invalid @enderror"
                                id="father_email" name="father_email"
                                value="{{ old('father_email', $student->guardian->father_email ?? '') }}" required>
                            @error('father_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="father_civil_id" class="form-label">Father's Civil ID</label>
                            <input type="text" class="form-control @error('father_civil_id') is-invalid @enderror"
                                id="father_civil_id" name="father_civil_id"
                                value="{{ old('father_civil_id', $student->guardian->father_civil_id ?? '') }}"
                                required>
                            @error('father_civil_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="father_address" class="form-label">Father's Address</label>
                            <input type="text" class="form-control @error('father_address') is-invalid @enderror"
                                id="father_address" name="father_address"
                                value="{{ old('father_address', $student->guardian->father_address ?? '') }}">
                            @error('father_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="father_job" class="form-label">Father's Job</label>
                            <input type="text" class="form-control @error('father_job') is-invalid @enderror"
                                id="father_job" name="father_job"
                                value="{{ old('father_job', $student->guardian->father_job ?? '') }}">
                            @error('father_job')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mother_name" class="form-label">Mother's Name</label>
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                id="mother_name" name="mother_name"
                                value="{{ old('mother_name', $student->guardian->mother_name ?? '') }}" required>
                            @error('mother_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mother_phone" class="form-label">Mother's Phone</label>
                            <input type="text" class="form-control @error('mother_phone') is-invalid @enderror"
                                id="mother_phone" name="mother_phone"
                                value="{{ old('mother_phone', $student->guardian->mother_phone ?? '') }}">
                            @error('mother_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mother_email" class="form-label">Mother's Email</label>
                            <input type="email" class="form-control @error('mother_email') is-invalid @enderror"
                                id="mother_email" name="mother_email"
                                value="{{ old('mother_email', $student->guardian->mother_email ?? '') }}" required>
                            @error('mother_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mother_civil_id" class="form-label">Mother's Civil ID</label>
                            <input type="text" class="form-control @error('mother_civil_id') is-invalid @enderror"
                                id="mother_civil_id" name="mother_civil_id"
                                value="{{ old('mother_civil_id', $student->guardian->mother_civil_id ?? '') }}"
                                required>
                            @error('mother_civil_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mother_address" class="form-label">Mother's Address</label>
                            <input type="text" class="form-control @error('mother_address') is-invalid @enderror"
                                id="mother_address" name="mother_address"
                                value="{{ old('mother_address', $student->guardian->mother_address ?? '') }}">
                            @error('mother_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mother_job" class="form-label">Mother's Job</label>
                            <input type="text" class="form-control @error('mother_job') is-invalid @enderror"
                                id="mother_job" name="mother_job"
                                value="{{ old('mother_job', $student->guardian->mother_job ?? '') }}">
                            @error('mother_job')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h5 class="text-secondary mt-4 mb-3 pb-2 border-bottom">Academic Information</h5>
                <div class="row">


                    <div class="col-md-12">
                        {{-- <div class="mb-3">
                            <label for="grade" class="form-label">Grade</label>
                            <select name="grade_id" class="form-select" id="grade">
                                @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}" {{ $student->grade_id == $grade->id ? 'selected' : ''
                                    }}>
                                    {{ $grade->name }}
                                </option>
                                @endforeach
                            </select>
                        </div> --}}
                        @livewire('classroom-selector', ['studentId' => $student->id])

                    </div>

                </div>

                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                        id="date_of_birth" name="date_of_birth"
                        value="{{ old('date_of_birth', $student->date_of_birth->format('Y-m-d')) }}" required>
                    @error('date_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="civil_id" class="form-label">Civil ID</label>
                    <input type="text" class="form-control @error('civil_id') is-invalid @enderror" id="civil_id"
                        name="civil_id" value="{{ old('civil_id', $student->civil_id) }}" required>
                    @error('civil_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address', $student->address) }}" required>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection