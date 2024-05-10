<?php

namespace App\Livewire\Forms;

use App\Models\Classroom;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ClassroomForm extends Form
{
    public $name;

    public ?Classroom $classroom = null;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'regex:/^[\p{L}\d\s]+$/u',
                Rule::unique('classrooms', 'name')->ignore($this->classroom),
            ],
        ];
    }

    public function setClassroom(Classroom $classroom)
    {
        $this->classroom = $classroom;
        $this->fill($this->classroom);
    }

    public function save()
    {
        $this->validate();

        if (!$this->classroom) {
            Classroom::create(['name' => $this->name]);
            return;
        }

        $this->classroom->update(['name' => $this->name]);
        return;
    }
}
