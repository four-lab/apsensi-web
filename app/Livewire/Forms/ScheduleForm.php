<?php

namespace App\Livewire\Forms;

use App\Models\Schedule;
use App\Repos\ScheduleRepository;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ScheduleForm extends Form
{
    public $classroom_id,
        $employee_id,
        $subject_id,
        $time_start,
        $time_end,
        $day;

    public function rules()
    {
        return [
            'classroom_id' => 'required|exists:classrooms,id',
            'employee_id' => 'required|exists:employees,id',
            'subject_id' => 'required|exists:subjects,id',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
            'day' => 'required|integer|in:1,2,3,4,5,6',
        ];
    }

    public function save()
    {
        $data = $this->validate();
        (new ScheduleRepository)->create($data);

        $this->reset();
        $this->resetValidation();
    }
}
