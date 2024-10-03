@extends('layouts.master')
<!-- Adjust according to your layout file -->

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background-color: #4e73df;
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 1.5rem;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        border: 1px solid #d1d3e2;
        padding: 0.75rem 1rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
    }

    .form-label {
        font-weight: 600;
        color: #5a5c69;
    }

    .progress {
        height: 0.5rem;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h2 class="m-0 font-weight-bold">Create New Student</h2>
                </div>
                <div class="card-body p-5">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <form action="{{ route('students.store') }}" method="POST" id="studentForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Student Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="civil_id" class="form-label">Civil ID</label>
                                <input type="text" class="form-control @error('civil_id') is-invalid @enderror"
                                    id="civil_id" name="civil_id" value="{{ old('civil_id') }}">
                                @error('civil_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="grade" class="form-label">Grade</label>
                                <select wire:model="selectedGrade"
                                    class="form-select @error('grade_id') is-invalid @enderror" name="grade_id"
                                    id="grade">
                                    <option value="">Select Grade</option>
                                    @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="classroom" class="form-label">Classroom</label>
                                <select class="form-select @error('classroom_id') is-invalid @enderror"
                                    name="classroom_id" id="classroom">
                                    <option value="">Select Classroom</option>
                                    @if(!empty($classrooms))
                                    @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('classroom_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="guardian" class="form-label">Guardian (Father's Name)</label>
                                <div class="input-group">
                                    <input list="guardianList"
                                        class="form-control @error('guardian_id') is-invalid @enderror"
                                        name="guardian_name" id="guardian" placeholder="Select or type father's name"
                                        autocomplete="off">
                                    <input type="hidden" name="guardian_id" id="guardian_id">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="clearGuardian">Clear</button>
                                </div>
                                <datalist id="guardianList">
                                    @foreach ($guardians as $guardian)
                                    <option data-id="{{ $guardian->id }}" value="{{ $guardian->father_name }}">
                                        @endforeach
                                </datalist>
                                <div id="selectedGuardian" class="form-text mt-2"></div>
                                @error('guardian_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Create Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('studentForm');
    const progressBar = document.querySelector('.progress-bar');
    const guardianInput = document.getElementById('guardian');
    const guardianIdInput = document.getElementById('guardian_id');
    const selectedGuardianDiv = document.getElementById('selectedGuardian');
    const clearButton = document.getElementById('clearGuardian');
    
    function updateProgress() {
        const inputs = form.querySelectorAll('input:not([type="hidden"]), select, textarea');
        let filledInputs = 0;
        inputs.forEach(input => {
            if (input.value.trim() !== '') filledInputs++;
        });
        const progress = (filledInputs / inputs.length) * 100;
        progressBar.style.width = `${progress}%`;
        progressBar.setAttribute('aria-valuenow', progress);
    }

    form.addEventListener('input', updateProgress);

    function updateSelectedGuardian() {
        const selectedOption = document.querySelector(`#guardianList option[value="${guardianInput.value}"]`);
        if (selectedOption) {
            const guardianId = selectedOption.dataset.id;
            guardianIdInput.value = guardianId;
            selectedGuardianDiv.textContent = `Selected: ${guardianInput.value} (ID: ${guardianId})`;
            selectedGuardianDiv.classList.add('text-success');
        } else {
            guardianIdInput.value = '';
            selectedGuardianDiv.textContent = 'No guardian selected';
            selectedGuardianDiv.classList.remove('text-success');
        }
    }

    guardianInput.addEventListener('input', updateSelectedGuardian);
    guardianInput.addEventListener('change', updateSelectedGuardian);

    clearButton.addEventListener('click', function() {
        guardianInput.value = '';
        guardianIdInput.value = '';
        selectedGuardianDiv.textContent = 'No guardian selected';
        selectedGuardianDiv.classList.remove('text-success');
        updateProgress();
    });

    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        let x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });

    // Initialize on page load
    updateSelectedGuardian();
    updateProgress();
});
</script>
@endsection