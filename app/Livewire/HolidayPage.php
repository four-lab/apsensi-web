<?php

namespace App\Livewire;

use App\Livewire\Forms\HolidayForm;
use App\Models\Holiday;
use Livewire\Attributes\On;
use Livewire\Component;

class HolidayPage extends Component
{
    public HolidayForm $form;

    public function render()
    {
        return view('pages.holiday.index');
    }

    public function save()
    {
        $holiday = $this->form->holiday;
        $this->form->save();

        $this->dispatch('holiday-saved');
        $this->dispatch('swal-s', $holiday ?
            'Berhasil mengubah hari libur' : 'Berhasil menambahkan hari libur');
    }

    #[On('holiday-cleared')]
    public function clear()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('holiday-edit')]
    public function edit($id)
    {
        $this->form->setHoliday(Holiday::findOrFail($id));
        $this->dispatch('show-modal');
    }

    #[On('holiday-delete')]
    public function delete($id)
    {
        $this->form->reset();

        $holiday = Holiday::findOrFail($id);
        $holiday->delete();

        $this->dispatch('swal-s', 'Berhasil menghapus hari libur');
        $this->dispatch('holiday-saved');
    }
}
