<?php

namespace App\Livewire;

use App\Models\Classroom;
use App\Models\Employee;
use App\Models\Subject;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('pages.dashboard', [
            'employees' => Employee::count(),
            'subjects' => Subject::count(),
            'classrooms' => Classroom::count(),
        ]);
    }
}
