@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Edit Guardian</h1>

            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('guardians.update', $guardian->id) }}" method="POST" id="guardianForm">
                        @csrf
                        @method('PUT')

                        <div id="formSteps">
                            <!-- Father Information -->
                            <div class="step" id="fatherStep">
                                <h3 class="mb-4">Father's Information</h3>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="father_name" class="form-label">Name</label>
                                        <input type="text" name="father_name" id="father_name" class="form-control"
                                            value="{{ $guardian->father_name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="father_phone" class="form-label">Phone</label>
                                        <input type="tel" name="father_phone" id="father_phone" class="form-control"
                                            value="{{ $guardian->father_phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="father_email" class="form-label">Email</label>
                                        <input type="email" name="father_email" id="father_email" class="form-control"
                                            value="{{ $guardian->father_email }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="father_civil_id" class="form-label">Civil ID</label>
                                        <input type="text" name="father_civil_id" id="father_civil_id"
                                            class="form-control" value="{{ $guardian->father_civil_id }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="father_address" class="form-label">Address</label>
                                        <input type="text" name="father_address" id="father_address"
                                            class="form-control" value="{{ $guardian->father_address }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="father_job" class="form-label">Job</label>
                                        <input type="text" name="father_job" id="father_job" class="form-control"
                                            value="{{ $guardian->father_job }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Mother Information -->
                            <div class="step" id="motherStep" style="display: none;">
                                <h3 class="mb-4">Mother's Information</h3>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="mother_name" class="form-label">Name</label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control"
                                            value="{{ $guardian->mother_name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mother_phone" class="form-label">Phone</label>
                                        <input type="tel" name="mother_phone" id="mother_phone" class="form-control"
                                            value="{{ $guardian->mother_phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mother_email" class="form-label">Email</label>
                                        <input type="email" name="mother_email" id="mother_email" class="form-control"
                                            value="{{ $guardian->mother_email }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mother_civil_id" class="form-label">Civil ID</label>
                                        <input type="text" name="mother_civil_id" id="mother_civil_id"
                                            class="form-control" value="{{ $guardian->mother_civil_id }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mother_address" class="form-label">Address</label>
                                        <input type="text" name="mother_address" id="mother_address"
                                            class="form-control" value="{{ $guardian->mother_address }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mother_job" class="form-label">Job</label>
                                        <input type="text" name="mother_job" id="mother_job" class="form-control"
                                            value="{{ $guardian->mother_job }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" id="prevBtn" class="btn btn-secondary"
                                style="display: none;">Previous</button>
                            <button type="button" id="nextBtn" class="btn btn-primary">Next</button>
                            <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">Update
                                Guardian</button>
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
    const form = document.getElementById('guardianForm');
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    let currentStep = 0;

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.style.display = index === stepIndex ? 'block' : 'none';
        });

        prevBtn.style.display = stepIndex > 0 ? 'block' : 'none';
        nextBtn.style.display = stepIndex < steps.length - 1 ? 'block' : 'none';
        submitBtn.style.display = stepIndex === steps.length - 1 ? 'block' : 'none';
    }

    function validateStep(stepIndex) {
        const inputs = steps[stepIndex].querySelectorAll('input[required]');
        let isValid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });
        return isValid;
    }

    nextBtn.addEventListener('click', function() {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        } else {
            alert('Please fill in all required fields.');
        }
    });

    prevBtn.addEventListener('click', function() {
        currentStep--;
        showStep(currentStep);
    });

    form.addEventListener('submit', function(event) {
        if (!validateStep(currentStep)) {
            event.preventDefault();
            alert('Please fill in all required fields.');
        }
    });

    showStep(currentStep);
});
</script>
@endsection