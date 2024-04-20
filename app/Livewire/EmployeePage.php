<?php

namespace App\Livewire;

use App\Livewire\Forms\EmployeeForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeePage extends Component
{
    use WithFileUploads;

    public EmployeeForm $form;

    public function render()
    {
        return view('pages.employee.index');
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function save()
    {
        $this->form->save();
        $this->form->reset();

        $this->dispatch('swal-s', 'Berhasil menambahkan pegawai');
        $this->dispatch('employee-saved');
    }
}
