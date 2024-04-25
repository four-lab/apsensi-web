<?php

namespace App\Livewire\Forms;

use App\Enums\HolidayType;
use Illuminate\Validation\Rule;
use Livewire\Form;

class HolidayForm extends Form
{
    public $information,
        $date_start,
        $date_end;

    public ?HolidayType $type = null;

    public function rules(): array
    {
        return [
            'information' => 'required|text',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => Rule::enum(HolidayType::class),
        ];
    }
}
