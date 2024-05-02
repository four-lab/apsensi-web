<?php

namespace App\Livewire\Forms;

use App\Models\Subject;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SubjectForm extends Form
{
    public $name, $max_lateness;

    public ?Subject $subject = null;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('subjects', 'name')->ignore($this->subject),
            ],
            'max_lateness' => 'required|integer|min:0|max:60',
        ];
    }

    public function setSubject(Subject $subject)
    {
        $this->subject = $subject;
        $this->fill($this->subject);
    }

    public function save()
    {
        $this->validate();

        if (!$this->subject) {
            Subject::create(['name' => $this->name, 'max_lateness' => $this->max_lateness]);
            return;
        }

        $this->subject->update(['name' => $this->name, 'max_lateness' => $this->max_lateness]);
        return;
    }
}
