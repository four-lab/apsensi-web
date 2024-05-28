<?php

namespace App\Livewire\Schedule;

use App\Models\Classroom;
use App\Models\Schedule;
use Livewire\Component;

class SchedulePage extends Component
{
    public $classId = 1;
    public $schedules = [];
    public $classrooms = [];

    public function mount()
    {
        $this->classrooms = Classroom::all();
        $this->classId = $this->classrooms->first()->id;
    }

    public function render()
    {
        foreach (range(1, 6) as $day)
            $this->schedules[$day] = Schedule::with('subject', 'employee', 'classroom')
                ->where('classroom_id', $this->classId)
                ->where('day', $day)
                ->get();

        return view('pages.schedule.index');
    }

    public function create()
    {
        return to_route('schedules.create', $this->classId);
    }
}
