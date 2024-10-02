<div class="row">
    selected grade === {{$selectedGrade}}
    <div class="col-md-6">
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <select wire:model.live="selectedGrade" class="form-select" id="grade">
                <option value="">Select Grade</option>
                @foreach ($grades as $grade)
                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        selected classroom === {{$selectedClassroom}}

        <div class="mb-3">
            <label for="classroom" class="form-label">Classroom</label>
            <select wire:model.live="selectedClassroom" class="form-select" id="classroom">
                <option value="">Select Classroom</option>
                @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>