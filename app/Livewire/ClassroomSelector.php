<?php

namespace App\Livewire;

use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Student;
use Livewire\Component;

class ClassroomSelector extends Component
{
    public $grades;
    public $classrooms = [];
    public $selectedGrade = null;
    public $selectedClassroom = null;
    public $student = null;

    public function mount($studentId = null)
    {
        $this->grades = Grade::all();
        $classrooms = Classroom::all();
        if ($studentId) {
            $this->student = Student::find($studentId);
            if ($this->student) {
                $this->selectedGrade = $this->student->grade_id;
                foreach ($classrooms as $classroom) {
                    $this->classrooms = Classroom::where('grade_id', $this->selectedGrade)->get();
                }
                $this->selectedClassroom = $this->student->classroom_id;
                // $this->loadClassrooms();
            }
        }
    }

    public function updatedSelectedGrade($gradeId)
    {
        $this->selectedClassroom = null;
        $this->loadClassrooms();
    }

    private function loadClassrooms()
    {
        if ($this->selectedGrade) {
            $this->classrooms = Classroom::where('grade_id', $this->selectedGrade)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function render()
    {
        return view('livewire.classroom-selector');
    }
}
