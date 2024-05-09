<?php

namespace App\Livewire\Forms;

use App\Enums\HolidayType;
use App\Models\Holiday;
use Illuminate\Validation\Rule;
use Livewire\Form;

class HolidayForm extends Form
{
    public $information,
        $date_start,
        $date_end;

    public ?Holiday $holiday = null;
    public HolidayType $type = HolidayType::REGULAR;

    public function rules(): array
    {
        return [
            'information' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'type' => Rule::enum(HolidayType::class),
        ];
    }

    public function setHoliday(Holiday $holiday)
    {
        $this->holiday = $holiday;

        $this->information = $holiday->information;
        $this->date_start = $holiday->date_start->format('Y-m-d');
        $this->date_end = $holiday->date_end->format('Y-m-d');
        $this->type = $holiday->type;
    }

    public function save(): void
    {
        $data = $this->validate();

        if (!$this->holiday) {
            Holiday::create($data);
            return;
        }

        $this->holiday->update($data);
        return;
    }
}
