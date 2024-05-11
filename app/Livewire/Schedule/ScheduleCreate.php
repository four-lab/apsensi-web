<?php

namespace App\Livewire\Schedule;

use App\Exceptions\ScheduleException;
use App\Livewire\Forms\ScheduleForm;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Subject;
use Livewire\Attributes\On;
use Livewire\Component;

class ScheduleCreate extends Component
{
    public $day = 1;
    public $classroom;
    public $employees = [];
    public $subjects = [];

    public ScheduleForm $form;

    public function mount(Classroom $classroom)
    {
        $this->classroom = $classroom;
        $this->employees = Employee::pluck('fullname', 'id')->toArray();
        $this->subjects = Subject::pluck('name', 'id')->toArray();
    }

    public function render()
    {
        $schedules = Schedule::with('subject', 'employee')
            ->where('classroom_id', $this->classroom->id)
            ->where('day', $this->day)
            ->orderBy('time_start', 'asc')
            ->get();

        return view('pages.schedule.create', compact('schedules'));
    }

    public function setDay($day)
    {
        $this->day = $day;
    }

    public function save()
    {
        $this->form->classroom_id = $this->classroom->id;
        $this->form->day = $this->day;

        try {
            $this->form->save();

            $this->dispatch('swal-s', 'Berhasil menambahkan jadwal');
            $this->dispatch('schedule-saved');
        } catch (ScheduleException $e) {
            $this->dispatch('swal-e', $e->getMessage());
        }
    }

    #[On('schedule-cleared')]
    public function clear()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('schedule-delete')]
    public function delete($id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->delete();
        $this->dispatch('swal-s', 'Berhasil menghapus jadwal');
    }
}
